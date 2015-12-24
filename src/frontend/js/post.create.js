(function(){
    'use strict';

    //
    // POST CREATE/EDIT
    //

    var $formPostCreate = $('#posts-create');
    var $formLog = $formPostCreate.find('.alert');
    var $formLoader = $formPostCreate.find('.loading');
    var $formContent = $formPostCreate.find('textarea');
    var $formResult = $formPostCreate.find('.blog-post-result .article-content');
    var $formHiddenResult = $formPostCreate.find('input[name=text_html]');
    var $formContentPreview = $formPostCreate.find('.btn-content-preview');
    window.marked.setOptions({
        renderer: new marked.Renderer(),
        gfm: true,
        tables: true,
        breaks: true,
        pedantic: false,
        sanitize: false,
        smartLists: true,
        smartypants: false,
        langPrefix: 'language-'
    });
    var getHtmlFromTextarea = function(){
        return window.marked($formContent.val());
    };
    $formContentPreview.on('click', function(){
        $formResult.html(getHtmlFromTextarea());
        App.hljs.init();
    });
    $formContent.on('blur', function(){
		$formHiddenResult.val(getHtmlFromTextarea());
	});

    $formPostCreate.ajaxForm(window.App.ajaxOptionsWrapper(
        // success
        function(response) {
            $formPostCreate.clearForm();
			$formResult.html('');
            $formLog.attr('class', 'alert alert-success').html(response).show().animate({
                opacity: 1
            }, 5000, function() {
                $formLog.attr('class', 'alert hide').html('');
            });
        },
        // before
        function() {
            $formLog.html('').hide();
            $formLoader.button('loading');
        },
        // complete
        function() {
            $formLoader.button('reset');
            $(window).scrollTop(0);
        },
        // error
        function(message) {
            message = '<p><strong>' + $formLog.data('errorHeader') + '</strong></p>' + message;
            $formLog.attr('class', 'alert alert-danger').html(message).show();
        }
    ));

    //
    // POST DELETE
    //

    var $formPostDelete = $formPostCreate.find('.delete');
    $formPostDelete.on('click', function(){
        var _this = this;
        if (confirm($(_this).data('confirm'))) {
            var options = window.App.ajaxOptionsWrapper(function(){
                window.location.href = $(_this).data('resultHref');
            });
            options.url = $(_this).attr('href');
            options.type = 'POST';
            options.data = {
                '_token': $(_this).data('token')
            };

            $.ajax(options);
        }
        return false;
    });

    //
    // POST AUTOCOMPLETE TAGS
    //
    var tagsCache = null;
    function extractLast( term ) {
        return split( term ).pop();
    }
    function split( val ) {
        return val.split( /,\s*/ );
    }
    var $formTags = $formPostCreate.find('input.tags');
    $formTags.on('keydown', function(event) {
        if (event.keyCode === $.ui.keyCode.TAB
            && $(this).data('ui-autocomplete').menu.active) {
            event.preventDefault();
        }
    }).autocomplete({
        minLength: 0,
        source: function(request, response) {
            if (!tagsCache) {
                $.ajax({
                    url: $formTags.data('autocompleteUrl'),
                    error: function() {
                        App.error('Tags not loaded!');
                    },
                    success: function(res) {
                        tagsCache = res;
                        response($.ui.autocomplete.filter(res, extractLast(request.term)));
                    }
                });
            } else {
                response($.ui.autocomplete.filter(tagsCache, extractLast(request.term)));
            }
        },
        focus: function() {
            return false;
        },
        select: function(event, ui) {
            var terms = split(this.value);
            terms.pop();                      // remove the current input
            terms.push(ui.item.value);        // add the selected item
            terms.push('');                   // add placeholder to get the
            // comma-and-space at the end
            $.unique(terms);                  // removal is not unique elements
            this.value = terms.join(', ');    // save new value
            return false;
        }
    });

})();