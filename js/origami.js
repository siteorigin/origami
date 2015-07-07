/**
 * Initialize the Origami WordPress theme
 * 
 * @copyright Greg Priday
 * @license GPL 2.0 http://www.gnu.org/licenses/gpl-2.0.html
 */

jQuery(function ($) {

    if( typeof $.fn.fitVids !== 'undefined' ) {
        // We use FitVids to scale videos to mobile devices
        $('.featured-video, .content, .content p').fitVids();
    }

    // FlexSlider is a great responsive slider
    $('.flexslider').flexslider();

});