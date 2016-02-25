<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Help
 *
 *  __ added:  12/10/14
 *
 * This is the intro form. It won't have any options because it will be outside the main form
 */

function weaverx_admin_help() {
?>
	<h2><?php _e('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/); ?></h2>

<br />
<?php _e('This is the Weaver Xtreme Admin help button: ', 'weaver-xtreme' /*adm*/); ?>
<?php weaverx_help_link('help.html#top', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/)); ?>
&nbsp;&nbsp;
<?php _e('Clicking the ? will open the Weaver Xtreme Help document.', 'weaver-xtreme' /*adm*/); ?>
</p>
<h2>
<?php _e('Please see our active ', 'weaver-xtreme' /*adm*/); ?>
<?php 		weaverx_site('','//forum.weavertheme.com/',__('Weaver Support Forum', 'weaver-xtreme' /*adm*/)); ?>
<?php _e('Support Forum</a> for online help.', 'weaver-xtreme' /*adm*/); ?>
</h2>
<br /><br />
<?php
	do_action('weaverxplus_admin','help');
?>
<div style="float:left;width:50%;padding-right:2%">
	<div class="atw-help">
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('help.html', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/), __('Theme Documentation (Customizer)', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('Complete documentation for using the Weaver Xtreme Theme and the Customizer option interface.', 'weaver-xtreme' /*adm*/); ?>
</p>

<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('legacy-help.html', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/), __('Theme Documentation (Legacy Admin)', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('Complete documentation for using the Weaver Xtreme Theme with the Legacy options interface.', 'weaver-xtreme' /*adm*/); ?>
</p>


<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('css-help.html', __('Weaver CSS Help', 'weaver-xtreme' /*adm*/), __('CSS HELP', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('A short CSS Tutorial', 'weaver-xtreme' /*adm*/); ?>
</p>
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('font-demo.html', __('Examples of supported fonts', 'weaver-xtreme' /*adm*/), __('Font Examples', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
<?php _e('Example of Font Families supported by Weaver Xtreme and Weaver Xtreme Plus.', 'weaver-xtreme' /*adm*/);
// Following Release Notes are not wrapped in translation as they are highly veriable, and will
// change with each update of the theme - even minor updates. Just doesn't make sense to translate them.
?>
</p>

<h3 style="text-decoration:underline;font-weight:bold;")>
	<?php _e('Release Notes', 'weaver-xtreme' /*adm*/); ?>
</h3>
<p>
	<em>Weaver Xtreme Version 2.0</em> represents a significant upgrade over Version 1.3.
	The major change is the addition of Customizer based options. All of the options
	previously handled via the legacy Theme Options interface are now included in
	the WordPress Customizer. Legacy Theme Options still available with <em>Weaver Xtreme Theme Support</em>
	plugin. You can now preview your changes live and on the fly.
	This is a revolutionary change in how you can design your own site.
</p>
<pre>
= Version 2.0 =
* New:     Added Customizer Option Interface - Setting options is now a WYSIWYG experience!
* New:     20+ Google Fonts included and integrated to free theme version.
*          -- Other additions and changes ---
* New:    Columns for post content
* New:    Added Header/Footer Center Content within HTML area option
* New:    Retain Menu Bar Hover BG Color option when open submenus
* New:    Top/Bottom margins on Primary, Secondary, Extra Menu bars
* New:    Character and Word spacing (Xtreme Plus)
* New:    Support for Cryllic, Greek, Hebrew, and Vietnamese character sets with some fonts.
* Change: Removed WP Appearance : "Theme Options" from core theme. (now included with theme support plugin)
* Change: Appearance "Theme Options" label changed to "Weaver Xtreme Admin"
* Change: No longer recommend WP Retina 2x plugin as that functionality is now in WP 4.4
* Tweak:  Default font changed to "Open Sans" from "Arial" to take advantage of Google Fonts.
* Tweak:  #header-html 100% width default
* Tweak:  Changed Footer Area, Container Area, and Info Bar to border-box.
* Tweak:  #content default margin bottom changed to 0. This works better with Customizer.
* Tweak:  Changed < hr > height to 2px for default.
* Tweak:  Mini Menu top margin default changed to 0em.
* Tweak:  Added .weaverx_inject_area class to all injection areas
* Fix:    Header/Footer HTML center alignment option
* Fix:    misc fixes/tweaks to Version 1.3

= Version 2.0.3 =
* New: Added Don't Use Customizer option for slow hosts/computers
* Fix: Container Max Width live update issue
* Fix: Switch to Customizer bad link on subdirectory installs
* Fix: Bug in menu bottom margin
* Fix: Header HTML would not hide if Centered
* Fix: Spelling error in Romanian translation file
* Fix: Customizer link color preview
* Tweak: new algorithm for Customizer Custom CSS live update
* Tweak: modified weaverx_site_title and weaverx_tagline filters to allow HTML
</pre>
</p>
	</div>
</div>
<div style="float:right;width:40%;padding-right:1%">

<h2><b><?php _e('RECOMMENDED PLUGINS', 'weaver-xtreme' /*adm*/); ?></b></h2>
<p><strong>
<?php _e('Some recommended plugins to use with your Weaver Xtreme Theme', 'weaver-xtreme' /*adm*/); ?>
</strong></p>
<ul>
<li style="font-size:120%;"><a href="//wordpress.org/plugins/weaverx-theme-support/" target="_blank"><?php _e('Weaver Xtreme Theme Support', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- provides <strong>essential</strong> Weaver Xtreme theme options and useful shortcodes', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="//wordpress.org/plugins/show-posts/" target="_blank"><?php _e('Weaver Show Posts', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- adds the [show_posts] shortcode to selectively display posts filtered by category, tag, order, id, etc.
Also adds additional filtering options to the Weaver Xtreme Page with Posts page template.
This formerly was integrated with Weaver, and was considered an important part of the theme.', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="//wordpress.org/plugins/show-sliders/" target="_blank"><?php _e('Weaver Show Sliders', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- good for any kind of slideshows - images, posts, [gallery] replacement', 'weaver-xtreme' /*adm*/);?>
</li>
<li><a href="https://wordpress.org/plugins/wp-edit/" target="_blank">WP Edit</a> -
<?php _e('WP Edit adds additional editing functionality to the default WordPress editor.
Allows content formatting without the need for extra HTML or CSS.
Also includes advanced features to manage your content such as post and page revision control.', 'weaver-xtreme' /*adm*/); ?>
</li>
</ul>

</div><div style="clear:both;"></div>

<?php
}

?>
