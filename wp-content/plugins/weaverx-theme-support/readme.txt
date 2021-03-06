=== Weaver Xtreme Theme Support ===
Plugin Name: Weaver Xtreme Theme Support
Plugin URI: http://weavertheme.com/plugins/
Tags: weaver x theme, shortcodes, widgets
Author URI: http://weavertheme.com/about/
Contributors: wpweaver
Author: wpweaver
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: weaverx-theme-support
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 2.0.3

A useful shortcode and widget collection for Weaver Xtreme

== Description ==

This is the main theme suppot for the Weaver X Theme. This plugin provides a collection of useful shortcodes and widgets designed to complement the Weaver X theme. These shortcodes have been selected and developed based on requests and feedback from thousands of users of the Weaver X, Weaver II, and Aspen themes.

While these shortcodes are optimized for the Weaver X theme, they will also work with full functionality for most WordPress themes, and can be used
if you switch themes.

Includes complete documentation help file. Instructions for using the shortcodes and widgets are in the help file. Use it for non-Weaver Xtreme themes.

= Shortcodes included =

* **[tab_group]** - Display content in a tabbed box.
* **[youtube]** - Show your YouTube videos responsively, and with the capability to use any of the YouTube custom display options.
* **[vimeo]** -  Show your Vimeo videos responsively, and with the capability to use any of the Vimeo custom display options.
* **[iframe]** - Quick and easy display of content in an iframe.
* **[div]**, **[span]**, **[html]** - Add div, span, and other html to pages/posts without the need to switch to Text view.
* **[hide/show_if]** - Show or hide content depending upon options: device, page ID, user capability, logged in status.
* **[bloginfo]** - Display any information available from WordPress bloginfo function.
* **[user_can]** - Display content base on logged in user role.
* **[site_title]** - Display Site title.
* **[site_tagline]** - Display Site tag line.

= Widgets Included =

* **Weaver X 2 Column Text Widget** - Add text into two columns in a widget
* **Weaver X Per Page Text Widget** - Add a text widget on a per page basis
* **Weaver X Login** - Simplified login widget

= Licenses =

* The Weaver X Theme Support plugin is licensed under the terms of the GNU GENERAL PUBLIC LICENSE, Version 2,
June 1991. (GPL) The full text of the license is in the license.txt file.
* All images included with this plugin are either original works of the author which
have been placed into the public domain, or have been derived from other public domain sources,
and thus need no license. (This does not include the images provided with any of the
below listed scripts and libraries. Those images are covered by their respective licenses.)

This plugin also includes several scripts and libraries that are covered under the terms
of their own licenses in the listed files in the plugin distribution:



== Installation ==

It is easiest to use the Plugins : Add Plugin admin page, but you can do it manually, too:

1. Download the plugin archive and expand it
2. Upload all the plugin files and directories to your wp-content/plugins/weaverx-theme-support directory
3. Go to the Plugins page in your WordPress Administration area and click 'Activate' for this plugin.

== Frequently Asked Questions ==

= Where can I get support for this plugin? =

Support for this plugin can best be found at our forum - http://forum.weavertheme.com

== Upgrade Notice ==

This is the initial release of this plugin.

== ChangeLog ==
== 2.0.3 =
* New: 'weaverx_paget_posts' filter to allow multiple page with posts templates in child themes

== 2.0.2 =
* Change: added required theme options support for Disable Integrated Google Fonts

= 2.0.1 =
* Change: wp-updates.com is long term down, so remove update check

= 2.0 =
* Final tweaks for Weaver Xtreme 2.0
* New: Google Fonts for Font Family selections

= 1.10 =
* New: Menu Bar Margin options
* Tweak: Remove download .zip theme files
* Tweak: Mini Menu top margin default

= 1.9.7 =
* More refinement
* New: "Retain menu bar hover color" when sub menu open
* Tweak: changed default of content bottom padding to 0.

= 1.9.2 =
* Continued refinement of interaction with Weaver 2.0. Weaver 2.0 will now retain some of the theme
  admin options (such as Save/Restore) which are not suitable for Theme Customizer.

= 1.9.1 =
* Weaver Xtreme 1.x users should continue to use this plugin, even with support for new version.
* Add new options for Weaver Xtreme 2.0

= 1.9 =
* Changes to support Weaver Xtreme Version 2.0 (for alpha test versions)

= 1.3.1 =
* Changed translation text domain to 'weaverx-theme-support'

= 1.3.1 =
* Fixed: tab shortcode styling

= 1.3 =
* Fix WP_Widget PHP constructor
* Test with WP 4.3

= 1.2.1 =
* Tweak: Per Post CSS rules are only supported by Weaver Xtreme Plus.

= 1.2 =
* New: Improved automatic version update for Weaver Xtreme -
  avoids critical update delays due to WordPress theme review process time lag
* Fixed issue with tabs shortcode

= 1.1 =
* Fixed some wording (ATW Show Posts -> Weaver Show Posts)
* Updated WP compatibility level
* Added new per page multi-column

= 1.0.4 =
* Fix: minor styling issue

= 1.0.3 =
* Fix: extra " in [ youtube ]

= 1.0.2 =
* Fix: z-index rule for tab shortcode

= 1.0.1 =
* New - Per Page/Post Report from Add-ons menu
* Fix: '\1234' values in per post style
* Fix: Internal name of Per Post Style - may cause loss of prevoius setting - sorry

= 1.0 =
* Minor tweaks
* wvrx_ shortcode prefix option

= 0.96 =
* Fixed bug with Per page options on Page with Posts
* Internal optimizations

= 0.95.1 =
* Only load if Weaver Xtreme is the active theme.

= 0.95 =
* Changed [ site_title ] and [ site_tagline ] to match theme style as option

= 0.10 =
* Fixed per page options when used with old Xtreme Plus version

= 0.9 =
* Added Per Page and Per Post admin support to plugin (removed from Xtreme theme)

= 0.8 =
* Added [ box ]

= 0.7 =
* Fixes for [ show/hide_if]
* Removed unused files

= 0.6 =
* Fixed [ show/hide_if ] for multiple conditions that include device
* Changed interface to Weaver Xtreme - all codes now just in Weaver X Add-ons tab

= 0.5 =
* Added [ show/hide_if ], removed [ hide_mobie ], [show_if_logged_in]
* Updated Doc
* Added action for interface to Weaver Xtreme "Add-ons" tab

= 0.4 =
* Optimized loading of jslib - only needed by tab group, so not loaded until shortcode used

= 0.3 =
* Fixed video shortcodes

= 0.1 =

* initial release
