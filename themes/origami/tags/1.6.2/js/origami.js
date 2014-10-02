/**
 * Initialize the Origami WordPress theme
 * 
 * @copyright Greg Priday
 * @license GPL 2.0 http://www.gnu.org/licenses/gpl-2.0.html
 */

jQuery(function ($) {
    // We use FitVids to scale videos to mobile devices 
    $('.featured-video, .content, .content p').fitVids();

    // FlexSlider is a great responsive slider
    $('.flexslider').flexslider();

    // Test and load polyfills
    if(!Modernizr.inlinesvg) {
        // No support for SVG, so replace with images where possible
        $('svg').each(function(){
            var $$ = $(this);

            if( typeof $$.data('replacement') != 'undefined' ) {

                $$.replaceWith(
                    $('<img>')
                        .attr( {
                            'src' : $$.data('replacement')
                        } )
                        .css( {
                            'width' : $$.attr('width'),
                            'height' : $$.attr('height')
                        } )
                );

            }
        })
    }

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