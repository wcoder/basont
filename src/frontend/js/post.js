(function(){
	'use strict';

	var GALLERIA_SELECTOR = '.galleria',
		GALLERIA_THEME_PATH = '/frontend/vendor/galleria/themes/classic/galleria.classic.min.js';

	if ($(GALLERIA_SELECTOR).length > 0)
	{
		Galleria.loadTheme(GALLERIA_THEME_PATH);
		Galleria.run(GALLERIA_SELECTOR, {
			lightbox: true,
			imageCrop: true,
    		thumbCrop: true,
			debug: false
		});
	}

})();