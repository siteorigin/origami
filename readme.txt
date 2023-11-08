=== Origami ===

Contributors: siteorigin

Tags: blog, photography, portfolio, one-column, custom-background, custom-colors, custom-header, custom-logo, custom-menu, editor-style, featured-images, footer-widgets, sticky-post, theme-options, threaded-comments, translation-ready

Tested up to: 6.4
Requires at least: 4.7
Requires PHP: 5.6.20
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Elegantly simple, with design and functionality that reflect its values of continuous improvement, attention to detail and refinement, Origami echoes the intricate art of its namesake in all facets.

== Description ==

With light colors, subtle contrasts and clear typography, Origami personifies simplicity. Origami’s clean, uncluttered design will help your content stand out and leave a lasting impression.

Origami's clean and minimal design focuses your reader’s attention squarely on your content. There are several post formats to choose from when deciding how best to display your beautiful content.

== Installation ==
	
1. Login to your WordPress installation, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Documentation ==

[Documentation](https://siteorigin.com/origami-documentation/) is available on siteorigin.com.

== Support ==

[Support](http://siteorigin.com/thread/) is available on siteorigin.com.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Origami includes support for:

* [Jetpack Infinite Scroll](https://jetpack.com/support/infinite-scroll/)
* [Jetpack Responsive Videos](https://jetpack.com/support/responsive-videos/)
* [SiteOrigin CSS](https://wordpress.org/plugins/so-css/)
* [SiteOrigin Page Builder](https://wordpress.org/plugins/siteorigin-panels/)
* [SiteOrigin Widgets Bundle](https://wordpress.org/plugins/so-widgets-bundle/)
* [WooCommerce](https://wordpress.org/plugins/woocommerce/)

== License ==

Origami WordPress Theme, Copyright 2016 SiteOrigin. Origami is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/copyleft/gpl.html.

Origami WordPress Theme is derived from Underscores WordPress Theme, Copyright 2012 Automattic http://underscores.me/ Underscores WordPress Theme is distributed under the terms of the GNU GPL.

== Images ==

Screenshot includes an image by Kathy Priday. Released under GPL.

"Brown Outdoor Plants" slide image in the demo folder sourced from [Pexels](https://www.pexels.com/photo/meadow-royalty-free-back-light-meadow-grass-73802/) licensed under [CC0 1.0 Universal (CC0 1.0)](http://creativecommons.org/publicdomain/zero/1.0/).

"Landscape Tree Sand Horizon Sky Sun" slide2 image in the demo folder sourced from [PxHere](https://pxhere.com/en/photo/1140785) licensed under [CC0 1.0 Universal (CC0 1.0)](http://creativecommons.org/publicdomain/zero/1.0/).

== Bundled Resources ==

FitVids, Copyright 2013, [Chris Coyier](http://css-tricks.com) and [Dave Rupert](http://daverupert.com)
Licensed under the WTFPL license
[Source](https://github.com/davatron5000/FitVids.js/)

FlexSlider, Copyright 2012 WooThemes
Free to use under the GPLv2 license
[Source](http://www.woothemes.com/flexslider/)

jQuery Placeholder, Copyright 2010 Mathias Bynens
Licensed under MIT and GPL licenses
[Source](https://github.com/mathiasbynens/jquery-placeholder)

Selectivizr, Copyright Keith Clark
Licensed under the MIT License
Source: https://github.com/keithclark/selectivizr

TinyColor, Copyright (c), Brian Grinstead
Licensed under the [MIT License](http://opensource.org/licenses/MIT)
[Source](https://github.com/bgrins/TinyColor)

== SiteOrigin Settings ==

This theme makes use of the [SiteOrigin Settings Framework](https://github.com/siteorigin/settings) contained in the /inc/settings folder. All code is licensed under GPL 2.0 and copyright 2016 SiteOrigin unless otherwise stated in the file header. 

== Changelog ==

= 1.10.1 - 15 August 2022 =
* Calendar Widget: Updated styling for new markup.
* Allowed HTML in Copyright Text field.
* Updated SiteOrigin Settings framework.

= 1.10.0 - 23 January 2022 =
* Added pagination to the `loop.php` Post Loop Widget template.
* Updated SiteOrigin Settings framework.

= 1.9 - 21 July 2021 =
* Disabled WP 5.8 Block-Based widgets editor. Can be re-enabled using `add_filter( 'siteorigin_settings_disable_new_widget_area', '__return_false' );`.

= 1.8.1 - 19 June 2021 =
* Only setup FitVids if enabled in Theme Settings. Ensures better compatibility with other plugins loading FitVids for fluid width video embeds.
* Set Google font display to block.
* Updated SiteOrigin Settings framework.

= 1.8 - 21 January 2021 =
* Added `Responsive Navigation Collapse` setting.
* Updated the Google Fonts array.
* Updated SiteOrigin Settings framework.

= 1.7.7 - 28 July 2019 =
* Resolved page missing `wp_link_pages` function.
* Added `wp_body_open` action hook.
* Added a skip to content link.
* Updated SiteOrigin Settings framework.

= 1.7.6 - 27 November 2018 =
* Add `siteorigin_panels_is_home()` check for `origami_gallery()`.
* Add required asterisks to comment form.

= 1.7.5 - 17 July 2017 =
* Added basic WooCommerce support.
* Updated settings framework.

= 1.7.4 - 19 June 2017 =
* Adjusted sub-menu z-index to avoid conflicts with Hero widget or similar elements.
* Added Featured Image support to pages.
* Updated the post class filter to remove hentry on pages. SEO improvement.
* Added taxonomy description on archive pages.
* Added the required attribute to comment forms.
* Make use of Jetpack Responsive Videos instead of FitVids if Jetpack is activated.
* Added Jetpack Infinite Scroll support.

= 1.7.3 - 19 August 2016 =
* Updated settings framework.

= 1.7.2 - 2 August 2016 =
* Updated settings framework.
* Integrated with SiteOrigin Premium.
* Fixed default settings.

= 1.7.1 - 2 June 2016 =
* Properly include all minified JS versions.

= 1.7 - 30 May 2016 =
* Moved theme settings to customizer.
* Updated to new settings and build frameworks.
* Added new about page.
* Updated TGM plugin activation.
* Added Jetpack infinite scroll support.
* Setting to disable search in the responsive menu.
* Removed unnecessary `.panels` styles.
* Added support for WordPress custom logo feature.
* Fixed Google Webfont URLs.
* Cleaned up CSS, removed unnecessary vendor prefixes.

= 1.6.4 =
* Added option to disable FitVids.
* Changed header to let users zoom on mobile.
* Framework updates.
* Optimized all images.
* Added TGM Plugin Activation for SiteOrigin plugins.
* Removed bundled Page Builder.

= 1.6.3 =
* Update HTML5Shiv
* Removed Modernizr to prevent JS error.
* Changed how minified JS files are enqueued.
* Small CSS tweaks.
* Framework updates.

= 1.6.2 =
* Framework updates to improve settings page.

= 1.6.1 =
* Improved compatibility with latest Page Builder changes.
* Renamed all page templates to comply with theme requirements.
* Transitioned away from using blog page templates.
* Updated to latest FitVids.
* Fixed licensing in readme file.
* Moved over to iconic fonts instead of SVG.
* Framework updates.

= 1.6 =
* Updated to latest framework.
* Changed theme screenshot to be fully GPL compatible.

= 1.5.17 =
* Updated to latest framework.
* Added setting to disable responsive mode.
* Added IE edge header to disable Internet Explorer compatibility mode.
* Improved bundled language file.

= 1.5.16 =
* Fixed possible issue with header image.
* Search bar drops below logo on mobile.
* Updated to latest framework.

= 1.5.15 =
* Removed iframe from premium upgrade page.
* Fixed URL field for Icon Text widget.
* Fixed issue with pagination not showing up.
* Premium: Fixed issue where mobile navigation couldn't be disabled.

= 1.5.14 =
* Updated to latest version of SiteOrigin framework.
* Premium: Fixed issue that was causing duplicate requests to updates server.

= 1.5.13 =
* Replaced SVG Polyfill with simple png image replacement.

= 1.5.12 =
* Updated to latest version of FitVid to fix mobile.
* Fixed social sharing in premium.
* Updated to latest version of SiteOrigin framework.

= 1.5.11 =
* Added feature road map information.

= 1.5.10 =
* Fixed blog archive template.
* Fixed issue that prevented users from updating Page Builder plugin.
* Fixed CSS issue with dropdown menu.

= 1.5.9 =
* Added multi-level menu.
* Updated to latest version of framework.
* Premium: Fixed social sharing.

= 1.5.8 =
* Added more child theme extendability.
* Added nesting to sub elements in widgets.
* Unified translation domain.
* Minor security updates.

= 1.5.7 =
* Improved extendability with child themes.
* Fixed centering of menu.

= 1.5.5 =
* Updated to latest framework.
* Minor CSS fixes.
* Changed Premium upgrade page.

= 1.5.4 =
* CSS fixes.
* Fixed title in feeds.
* Updated to latest framework.

= 1.5.2 =
* Fixed error when activating Page Builder plugin.
* Updated premium upgrade information.

= 1.4.9 - 1.4.10 =
* Small version number changes for theme uploader.

= 1.4.8 =
* Updated to latest version of framework.
* Fixed issue with blog archive page template.
* Fixed premium maps widget.

= 1.4.7 =
* Fixed social sharing on single post pages.
* Fixed issue with next and previous posts setting.
* Updated to the latest version of FlexSlider.

= 1.4.6 =
* Small fix to the blog page template.
* Fixed conflict with page builder plugin.

= 1.4.5 =
* Added blog page archive.
* Fixed conflict with home page and columns.
* Fixes bugs in panels page builder.

= 1.4.4 =
* Fix to notification/welcome bar.
* Minor fixes to Panels.

= 1.4.3 =
* Added home page builder.
* Fixed issue with column setting.

= 1.4.2 =
* Usability improvements to Panels.

= 1.4 - 1.4.1 =
* Updated and integrated the latest SiteOrigin framework.
* Integrated page builder.
* Added widgets.
* Various bug fixes.
* A few additional options.

= 1.3.2 =
* Fixed a bug in the custom gallery.
* Fixed translation issues.
* General code clean up.

= 1.2.7 =
* Fixed theme endpoint and version number.

= 1.2.6 =
* Added option to center logo.
* Fixed logo scaling for responsive layout.
* Using wp_enqueue_style to enqueue style.css.

= 1.2.5 =
* Added Selectivizr.
* Various minor fixes.

= 1.2.4 =
* Various bug fixes.

= 1.1 =
* Removed dependence on Simple Options plugin.
* Added more settings and options.
* Referenced new Origami Premium.
* Fixed gallery ordering.
* Various bug fixes.

= 1.0.3 =
* Fixed bug with logo.
* Added editor-style.css.
* Improved W3C HTML validation.
* Code quality improvement.
* Fixed content columns.
* Added link to documentation in admin.

= 1.0.2 =
* Critical fix in comment form.

= 1.0.1 =
* Various bug fixes and updates.

= 1.0 =   
* Initial Release.
