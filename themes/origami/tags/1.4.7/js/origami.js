/**
 * Initialize the Origami WordPress theme
 * 
 * @copyright Greg Priday
 * @license GPL 2.0 http://www.gnu.org/licenses/gpl-2.0.html
 */

jQuery(function ($) {
    // We use FitVids to scale videos to mobile devices 
    $('.featured-video, .content').fitVids();

    // FlexSlider is a great responsive slider
    $('.flexslider').flexslider();

    // Test and load polyfills
    Modernizr.load({
        test : Modernizr.inlinesvg,
        nope : origami.polyfills + '/sie-mini.js'
    });

    // Init the placeholder
    Modernizr.load({
        test : Modernizr.input.autocomplete,
        nope : origami.polyfills + '/jquery.placeholder.min.js',
        complete:function () {
            if (Modernizr.input.autocomplete) return;
            $('input[placeholder], textarea[placeholder]').placeholder();
        }
    });
});