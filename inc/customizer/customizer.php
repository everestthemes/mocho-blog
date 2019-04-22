<?php
/**
 * Mocho Blog Theme Customizer
 *
 * @package Mocho_Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mocho_blog_customize_register( $wp_customize ) {

	/**
	 * Custom Customize Control
	 */
	require get_template_directory() . '/inc/customizer/customize-controls.php';

	/**
	 * Sanitization Functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize-callback.php';

	/**
	 * Customizer Options
	 */
	require get_template_directory() . '/inc/customizer/customizer-options.php';

	// Upspell
	require get_template_directory() . '/inc/upgrade-to-pro/upgrade.php';

	$wp_customize->register_section_type( 'Mocho_Blog_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Mocho_Blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Mocho Blog Pro', 'mocho-blog' ),
				'pro_text' => esc_html__( 'Move to Pro', 'mocho-blog' ),
				'pro_url'  => 'https://everestthemes.com/downloads/mocho-blog-pro/',
				'priority' => 1,
			)
		)
	);


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_section('colors')->title = esc_html__( 'Color Options', 'mocho-blog' );
    $wp_customize->get_section('colors')->priority = 10;



	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'mocho_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'mocho_blog_customize_partial_blogdescription',
		) );
	}


}
add_action( 'customize_register', 'mocho_blog_customize_register' );

/**
 * Load Customizer Option Choices
 */
require get_template_directory() . '/inc/customizer/option-choices.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mocho_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mocho_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mocho_blog_customize_preview_js() {
	wp_enqueue_script( 'mocho-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mocho_blog_customize_preview_js' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mocho_blog_customizer_script() {
	wp_enqueue_style( 'chosen', get_template_directory_uri() .'/assets/admin/css/chosen.css');
	wp_enqueue_style( 'mocho-blog-upgrade', get_template_directory_uri() . '/assets/admin/css/upgrade.css');
	wp_enqueue_style( 'mocho-blog-customizer', get_template_directory_uri() .'/assets/admin/css/customizer.css' );
	wp_enqueue_script( 'chosen-jquery', get_template_directory_uri() .'/assets/admin/js/chosen.jquery.js', array( 'jquery' ),'1.8.3', true  );
	wp_enqueue_script('mocho-blog-upgrade', get_template_directory_uri() . '/assets/admin/js/upgrade.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'mocho-blog-customizer', get_template_directory_uri() .'/assets/admin/js/customizer.js', array( 'jquery' ),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'mocho_blog_customizer_script' );
