<?php

if ( ! function_exists( 'weaverx_customizer_define_layout_sections' ) ) :
/**
 * Define the sections and settings for the template for other panels panel
 */
function weaverx_customizer_define_layout_sections( $sections ) {
	$panel = 'weaverx_layout';
	$layout_sections = array();

	/**
	 * General
	 */
	$layout_sections['layout-general'] = array(
		'panel'   => $panel,
		'title'   => __( 'Global layout', 'weaver-xtreme' ),
		'description' => 'Set font and other layout attributes. Use Site Colors to set colors.',
		'options' => array(
			'layout-heading-global' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Global Layout', 'weaver-xtreme' ),
					'type'  => 'heading',
				),
			),


		),
	);


	/**
	 * Site Header
	 */
	$layout_sections['layout-header'] = array(
		'panel'   => $panel,
		'title'   => __( 'Site Header layout', 'weaver-xtreme' ),
		'options' => array(
		'layout-heading-header' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Site Header', 'weaver-xtreme' ),
					'type'  => 'heading',
				),
			),
		),
	);


	/**
	 * Main Menu
	 */
	$layout_sections['layout-menus'] = array(
		'panel'   => $panel,
		'title'   => __( 'Menu layout', 'weaver-xtreme' ),
		'description' => __( 'Set layout for Menus.', 'weaver-xtreme' ),
		'options' => array(
			'layout-mm-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Primary Menu', 'weaver-xtreme' ),
					'type'  => 'group-title',
				),
			),


			'layout-sm-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Secondary Menu', 'weaver-xtreme' ),
					'description' => __('You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme'),
					'type'  => 'group-title',
				),
			),


			'layout-minim-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Header Mini Menu', 'weaver-xtreme' ),
					'description' => __('You must define a Header Menu from the Custom Menus Content menu.', 'weaver-xtreme'),
					'type'  => 'group-title',
				),
			),


			'layout-allmenus-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'layout For All Menus', 'weaver-xtreme' ),
					'description' => __('These options specify current page attributes for all menus.', 'weaver-xtreme'),
					'type'  => 'group-title',
				),
			),

		),
	);

	/**
	 * Info Bar
	 */
	$layout_sections['layout-info-bar'] = array(
		'panel'   => $panel,
		'title'   => __( 'Info Bar', 'weaver-xtreme' ),
		'description' => __('Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme'),
		'options' => array(
		'layout-info-bar-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Info Bar', 'weaver-xtreme' ),
					'type'  => 'heading',

				),
			),
		),
	);

	/**
	 * Content
	 */
	$layout_sections['layout-content'] = array(
		'panel'   => $panel,
		'title'   => __( 'Content layout', 'weaver-xtreme' ),
		'description' => __('layout for general page and post content.', 'weaver-xtreme'),
		'options' => array(
		'layout-content-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'General Content', 'weaver-xtreme' ),
					'type'  => 'heading',

				),
			),
		),
	);

	/**
	 * Post Specific
	 */
	$layout_sections['layout-post-specific'] = array(
		'panel'   => $panel,
		'title'   => __( 'Post Specific layout', 'weaver-xtreme' ),
		'description' => __('Post Specific layout - override Content layout.', 'weaver-xtreme'),
		'options' => array(
		'layout-postspecific-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Post Specific', 'weaver-xtreme' ),
					'type'  => 'heading',
				),
			),
		),
	);


	/**
	 * Sidebars
	 */
	$layout_sections['layout-sidebars'] = array(
		'panel'   => $panel,
		'title'   => __( 'Sidebars / Widget Areas', 'weaver-xtreme' ),
		'description' => __('Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels.', 'weaver-xtreme'),
		'options' => array(
			'layout-primary-widget-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Primary Widget Area', 'weaver-xtreme' ),
					'description' => '',
					'type'  => 'group-title',
				),
			),



			'layout-secondary-widget-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Secondary Widget Area', 'weaver-xtreme' ),
					'description' => '',
					'type'  => 'group-title',
				),
			),



			'layout-top-widget-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Top Widget Areas', 'weaver-xtreme' ),
					'description' => __('Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme'),
					'type'  => 'group-title',
				),
			),


			'layout-bottom-widget-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Bottom Widget Areas', 'weaver-xtreme' ),
					'description' => __('Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme'),
					'type'  => 'group-title',
				),
			),
		),
	);

	/**
	 * Widgets
	 */
	$layout_sections['layout-widgets'] = array(
		'panel'   => $panel,
		'title'   => __( 'Individual Widget', 'weaver-xtreme' ),
		'options' => array(
		'layout-widgets-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'Individual Widget Areas', 'weaver-xtreme' ),
					'type'  => 'heading',
				),
			),
		),
	);


	/**
	 * Footer
	 */
	$layout_sections['layout-footer'] = array(
		'panel'   => $panel,
		'title'   => __( 'Footer', 'weaver-xtreme' ),
		'options' => array(
			'layout-footer-heading' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'FOOTER', 'weaver-xtreme' ),
					'type'  => 'heading',
				),
			),
		),
	);

	/**
	 * Filter the definitions for the controls in the Color Scheme panel of the Customizer.
	 *
	 * @since 1.3.0.
	 *
	 * @param array    $layout_sections    The array of definitions.
	 */
	$layout_sections = apply_filters( 'weaverx_customizer_layout_sections', $layout_sections );

	// Merge with master array
	return array_merge( $sections, $layout_sections );


}
endif;

add_filter( 'weaverx_customizer_sections', 'weaverx_customizer_define_layout_sections' );
