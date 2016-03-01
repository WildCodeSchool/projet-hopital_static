<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The Header for Weaver Xtreme
 *
 * Displays all of the <head> section and everything up till < div id="container" >
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 *
 * 	>>>> DO NOT EDIT THIS FILE <<<<
 *
 * Warning! DO NOT EDIT THIS FILE, or any other theme file! If you edit ANY theme
 * file, all your changes will be LOST when you update the theme to a newer version.
 * Instead, if you need to change theme functionality, CREATE A CHILD THEME!
 *
 *	>>>> DO NOT EDIT THIS FILE <<<<
 */
if (function_exists('weaverx_ts_pp_switch'))	// switching to alternate theme?
	weaverx_ts_pp_switch();

?><!DOCTYPE html>
<!--[if IE 8]>	<html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>	<html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if !(IE 8) | !(IE 9) ]><!-->	<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- Jquery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
	$viewport = "<meta name='viewport' content='width=device-width,initial-scale=1.0' />\n"; /* use full horizontal size on iPad */
	echo $viewport;
?>

<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />
<!-- Weaver Xtreme Standard Google Fonts -->
<?php
	$gf = WEAVERX_GOOGLE_FONTS;
	if (weaverx_getopt('font_set_cryllic')) {
		$gf = str_replace('&subset=','&subset=cyrillic-ext,', $gf);
	}
	if (weaverx_getopt('font_set_greek')) {
		$gf = str_replace('&subset=','&subset=greek,greek-ext,', $gf);
	}
	if (weaverx_getopt('font_set_hebrew')) {
		$gf = str_replace('&subset=','&subset=hebrew,', $gf);
	}
	if (weaverx_getopt('font_set_vietnamese')) {
		$gf = str_replace('&subset=','&subset=vietnamese,', $gf);
	}

	if ( ! weaverx_getopt('disable_google_fonts'))
		echo $gf . "\n";

	// Now we need to polyfill IE8. We need 2 scripts loaded AFTER the .css stylesheets. wp_enqueue_script
	// does not work because it can't add the test for < IE9. And you can't just include the code directly
	// right here because it ends up before the .css enqueues. So we use a little trick as an action for
	// wp_head which lets us put the code here, but have it emitted after the .css files.

	add_action( 'wp_head', 'weaverx_add_ie_scripts' );
	// ++++ FAVICON - only if option has been set ++++
	$icon = weaverx_getopt('_favicon_url');
	if ($icon != '') {
		$url = esc_url(apply_filters('weaverx_css',parse_url($icon,PHP_URL_PATH)));
		echo "<link rel=\"shortcut icon\"  href=\"$url\" />\n";
	}

	do_action('weaverxplus_action','head');	// stuff like other style files...

	// Fix IE8 scripts need to go after the CSS is loaded (at least for the respond script)

	wp_head();
	//echo "<style id='live_custom_css'></style>";
?>
</head>

<body <?php body_class(); ?>>
<a href="#page-bottom" id="page-top">&darr;</a> <!-- add custom CSS to use this page-bottom link -->
<div id="wvrx-page-width">&nbsp;</div>
<noscript><p style="border:1px solid red;font-size:14px;background-color:pink;padding:5px;margin-left:auto;margin-right:auto;max-width:640px;text-align:center;">
<?php _e('JAVASCRIPT IS DISABLED. Please enable JavaScript on your browser to best view this site.', 'weaver-xtreme' /*adm*/); ?></p></noscript><!-- displayed only if JavaScript disabled -->
<?php



	if ( false && WEAVERX_DEV_MODE ) {
		if (is_customize_preview())
			echo '<h2>DISPLAYED WHILE CUSTOMIZER UP</h2>';
	}

	weaverx_inject_area('prewrapper');

	weaverx_area_div( 'wrapper' );

	weaverx_inject_area('fixedtop');	// inject fixed top


	/* header layout:
	 * #header
	 *    #top-menu
	 *    #branding
	 *        #site-title
	 *        #site-tagline
	 *    #header-html
	 *    #header-widget-area
	 *    #bottom-menu
	 */

	$hdr_class = ( weaverx_is_checked_page_opt('_pp_hide_header') ) ? 'hide' : '';

	weaverx_clear_both('preheader');
	weaverx_inject_area('preheader');	// inject pre-header HTML
	weaverx_area_div( 'header',  $hdr_class );      // <div id='header'>

	weaverx_inject_area('header');	// inject header HTML

	do_action('weaverx_nav', 'top');                // menus at top

	/* ======== HEADER WIDGET AREA ======== */
	weaverx_header_widget_area( 'top' );           // show header widget area if set to this position

	$title =  apply_filters('weaverx_site_title', esc_html(get_bloginfo( 'name', 'display' ) ) );
?>

	<button class="header_button first_button" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		Nous situer
	</button>
	
	<button class="header_button second_button" type="button" class="btn btn-primary btn-lg">
		Nous contacter
	</button>
	
	<form role="search" method="get" class="search-form" action="http://80.67.190.170/projet-hopital_static/">
		<label>
			<input type="search" class="header_button third_button" placeholder="Recherche…" value="" name="s" title="Rechercher&nbsp;:">
		</label>
		<input type="submit" class="search-submit" value="Rechercher">
	</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nous situer</h4>
      </div>
      <div class="modal-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2645.501545358698!2d1.0087589153727599!3d48.46609263620238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e3c1f06011b77f%3A0xc382764b99c6e0a!2sH%C3%B4pital+Local!5e0!3m2!1sfr!2sfr!4v1456821011813" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
	$('#myInput').focus()
})	
</script>

<header id="branding" role="banner">
<?php
	/* ======== SITE LOGO and TITLE ======== */
	if ( weaverx_getopt('title_over_image') )
		echo '<div id="title-over-image">' . "\n";

	$h_class = '';

	if ( weaverx_getopt('hide_site_title') != 'hide-none') {
		$h_class = weaverx_getopt('hide_site_title');
		$lead = ' ';
	}

	if ( weaverx_getopt('site_title_add_class') != 'hide-none') {
		$t_class = weaverx_getopt('site_title_add_class');
		echo "    <div id=\"title-tagline\" class=\"clearfix {$t_class}\" >\n";
	} else {
		echo "    <div id=\"title-tagline\" class=\"clearfix\" >\n";
	}
	$logo = weaverx_getopt( '_site_logo' );
	$hide_logo = weaverx_getopt( '_hide_site_logo' );

?>
		<h1 id="site-title"<?php echo weaverx_title_class( 'site_title', false, $h_class ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo $title; ?>" rel="home">
		<?php echo $title; ?></a></h1>

		<?php /* ======== SEARCH BOX ======== */
		$hide_tag = weaverx_getopt( 'hide_site_tagline' );

		$tagline =  apply_filters('weaverx_tagline', esc_html(get_bloginfo( 'description' )) );

		?>
		<h2 id="site-tagline" class="<?php echo $hide_tag; ?>"><span<?php echo weaverx_title_class('tagline'); ?>><?php echo $tagline; ?></span></h2>
		<div id="site-logo" class="site-logo <?php echo $hide_logo; ?>"><?php echo $logo; ?></div>
		<?php get_template_part( 'templates/menu', 'header-mini' ); ?>

	</div><!-- /.title-tagline -->

<?php

	/* The Dynamic Headers shows headers on a per page basis - will also optionally add site link */
	if (function_exists('show_media_header'))
		show_media_header(); 			// Plugin support: **Dynamic Headers**

	weaverx_header_widget_area( 'before_header' );           // show header widget area if set to this position

	/* ======== HEADER IMAGE ======== */
	global $weaverx_header;

	if ( !( weaverx_is_checked_page_opt('_pp_hide_header_image') && !is_search() ) ) { // don't bother if hide per page

		$h_hide = weaverx_getopt_default('hide_header_image', 'hide-none');

		// really hide - don't need to have device download the image
		$really_hide = ( $h_hide == 'hide' || ( weaverx_getopt('hide_header_image_front') && is_front_page() )) ;

		if ( $h_hide == 'hide-none' || $h_hide == 'hide')
			$h_hide = ' class="header-image"';
		else
			$h_hide = ' class="header-image ' . $h_hide . '"';

		if (weaverx_getopt('header_image_add_class') != '') {
			$h_hide = str_replace('"header-image','"header-image ' . weaverx_getopt('header_image_add_class'), $h_hide);
		}


		if (  ! $really_hide  ) {

			echo("<div id=\"header-image\"" . $h_hide . ">\n");

			global $weaverx_header;
			/* Check if this is a post or page, if it has a thumbnail,  and if it's a big one */
			$page_type = ( is_single() ) ? 'post' : 'page';
			if (    $GLOBALS['weaverx_page_who'] == 'blog'
				||  $GLOBALS['weaverx_page_is_archive']
				||  !weaverx_fi( $page_type, 'header-image' ) ) {
				$hdr = get_header_image();
				if ($hdr) {
					// wp customizer preview hack for WP 4.4 beta, might go away for 4.4 release
					$url = get_template_directory_uri();
					$url = str_replace(array('http://', 'https://'),'', $url);
					$hdr = str_replace('%s', $url, $hdr);		// 4.4 preview breaks this
					$hdr = str_replace(array('http://', 'https://'),'//', $hdr);

					if ( weaverx_getopt('link_site_image') ) { ?>
<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php } ?>
				<img src="<?php echo $hdr ?>"  alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /> <?php
					weaverx_e_opt('link_site_image',"</a>\n");	/* need to close link */
				} else {
					echo '<div class="clear-header-image" style="clear:both"></div>'; // needs a clear if not an img
				}
			}

			echo("\t\t</div><!-- #header-image -->\n");
		} // ! $really_hide
	} /* end hide-header-image */

	if (weaverx_getopt('title_over_image') )
		echo '</div><!--/#title-over-image -->' . "\n";

	weaverx_header_widget_area( 'after_header' );           // show header widget area if set to this position

	/* ======== EXTRA HTML ======== */

	$extra = weaverx_getopt('header_html_text');

	$hide = weaverx_getopt_default('header_html_hide', 'hide-none');

	if ( $extra == '' && is_customize_preview() ) {
		echo '<div id="header-html" style="display:inline;"></div>';		// need the area there for customizer live preview
	} else if ( $extra != '' && $hide != 'hide' ) {
		$c_class = weaverx_area_class('header_html', 'not-pad', '-none', 'margin-none' );
		?>
		<div id="header-html" class="<?php echo $c_class;?>">
			<?php echo  do_shortcode($extra) ; ?>
		</div> <!-- #header-html -->
	<?php }

	weaverx_header_widget_area( 'after_html' );           // show header widget area if set to this position

	do_action('weaverxplus_action','header_area_bottom');
	weaverx_clear_both('branding');

?>
</header><!-- #branding -->
<?php

	/* ======== BOTTOM MENU ======== */
	do_action('weaverx_nav', 'bottom');

	weaverx_header_widget_area( 'after_menu' );           // show header widget area if set to this position
	echo "\n</div><div class='clear-header-end' style='clear:both;'></div><!-- #header -->\n";
	do_action('weaverx_post_header');
?>
