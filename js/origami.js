jQuery(function($){
	$('.featured-video').fitVids();
	$('.blueberry').blueberry({crop:false});
	
	// Test and load polyfills
	Modernizr.load({
		test : Modernizr.inlinesvg,
		nope: origami.polyfills + '/sie-mini.js'
	});
	
	// Init the placeholder
	Modernizr.load({
		test : Modernizr.input.autocomplete,
		nope: origami.polyfills + '/jquery.placeholder.min.js',
		complete : function(){
			if(Modernizr.input.autocomplete) return;
			$('input[placeholder], textarea[placeholder]').placeholder();
		}
	});
});