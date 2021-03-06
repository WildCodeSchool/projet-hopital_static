<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 *   The Template for displaying all single posts.
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */

	global $weaverx_cur_page_ID;
	$weaverx_cur_page_ID = get_the_ID();

	$sb_layout = weaverx_page_lead( 'single' );

	// and next the content area.
	weaverx_sb_precontent('single');

	// generate page content


	$cats = weaverx_getopt_checked('single_nav_link_cats');
	while ( have_posts() ) {
		weaverx_post_count_clear();
		the_post(); ?>
	<nav id="nav-above" class="navigation">
	<h3 class="assistive-text"><?php echo __( 'Post navigation','weaver-xtreme'); ?></h3>
	<?php if (weaverx_getopt('single_nav_style')=='prev_next') { ?>
		<div class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous','weaver-xtreme'), $cats ); ?></div>
		<div class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>','weaver-xtreme'), $cats); ?></div>
	<?php } else { ?>
		<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link','weaver-xtreme') . '</span> %title', $cats ); ?>
		</div>
		<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link','weaver-xtreme') . '</span>' , $cats); ?></div>                 <?php } ?>
	</nav><!-- #nav-above -->

	<?php get_template_part( 'templates/content', 'single' ); ?>

	<nav id="nav-below" class="navigation">
	<h3 class="assistive-text"><?php echo __( 'Post navigation','weaver-xtreme'); ?></h3>
	<?php if (weaverx_getopt('single_nav_style')=='prev_next') { ?>
		<div class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous','weaver-xtreme'), $cats ); ?></div>
		<div class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>','weaver-xtreme'), $cats ); ?></div>
	<?php } else { ?>
		<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link','weaver-xtreme') . '</span> %title', weaverx_getopt_checked('single_nav_link_cats') ); ?></div>
		<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link','weaver-xtreme') . '</span>', $cats ); ?></div>
	<?php } ?>
	</nav><!-- #nav-above -->

	<?php comments_template( '', true );

	} // end of the loop.

	weaverx_sb_postcontent('single');

	weaverx_page_tail( 'single', $sb_layout );    // end of page wrap
?>
