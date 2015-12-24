(function(){
    'use strict';

    var App = {};
    window.App = App;

    App.error = function(message) {
        alert(message);
    };

    App.ajaxOptionsWrapper = function(callback, before, complete, error) {
        before = before || function() {};
        complete = complete || function() {};
        error = error || App.error;

        return {
            beforeSubmit: before,
            complete: complete,
            error: function(xhr) {
                error(xhr.responseText);
            },
            success: function(response) {
                if (response.error) {
                    error(response.message);
                } else {
                    callback(response.data);
                }
            }
        };
    };


    App.hljs = hljs;
    App.hljs.init = function(){
        $('pre code').each(function(i, e){
            App.hljs.highlightBlock(e);
			App.hljs.lineNumbersBlock(e);
        });
    };
    App.hljs.configure({
        tabReplace: '<span class="indent">\t</span>'
    });
    App.hljs.init();
	
	
	App.navbar = {};
	App.navbar.init = function(){
		try {
			$('#nav > .navbar-items a').each(function(i, e){
				e.parentNode.className = e.href === location.href ? 'navbar-item-active' : '';
			});
		} catch (e) {
			console.log(e);
		}
	};
	App.navbar.init();

})();