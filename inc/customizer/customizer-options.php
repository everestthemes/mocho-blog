<?php
/**
 * Customizer Options Declaration
 *
 * @package Mocho_Blog
 */

// Home Page Customization Panel
$wp_customize->add_panel(
	'mocho_blog_homepage_customization',
	array(
		'title' => esc_html__( 'Homepage Customization', 'mocho-blog' ),
		'description' => esc_html__( 'Cream Blog Pro Homepage Customization. Set Options For Homepage Customization.', 'mocho-blog' ),
		'priority' => 10,
	)
);

// Basic Theme Customization Panel
$wp_customize->add_panel(
	'mocho_blog_basic_customization',
	array(
		'title' => esc_html__( 'Basic Customization', 'mocho-blog' ),
		'description' => esc_html__( 'Cream Blog Pro Basic Customization. Set Options For Basic Theme Customization.', 'mocho-blog' ),
		'priority' => 10,
	)
);

// Advance Theme Customization Panel
$wp_customize->add_panel(
	'mocho_blog_advance_customization',
	array(
		'title' => esc_html__( 'Advance Customization', 'mocho-blog' ),
		'description' => esc_html__( 'Cream Blog Pro Advance Customization. Set Options For Advance Theme Customization.', 'mocho-blog' ),
		'priority' => 10,
	)
);

$wp_customize->get_section( 'static_front_page' )->panel = 'mocho_blog_basic_customization';
$wp_customize->get_section( 'title_tagline' )->panel = 'mocho_blog_basic_customization';
$wp_customize->get_section( 'colors' )->panel = 'mocho_blog_basic_customization';
$wp_customize->get_section( 'header_image' )->panel = 'mocho_blog_basic_customization';
$wp_customize->get_section( 'background_image' )->panel = 'mocho_blog_basic_customization';
$wp_customize->get_section( 'custom_css' )->panel = 'mocho_blog_basic_customization';


require get_template_directory() . '/inc/customizer/options/option-header.php';

require get_template_directory() . '/inc/customizer/options/option-footer.php';

require get_template_directory() . '/inc/customizer/options/option-banner.php';

require get_template_directory() . '/inc/customizer/options/option-featuredpost.php';

require get_template_directory() . '/inc/customizer/options/option-postpage.php';

require get_template_directory() . '/inc/customizer/options/option-sidebar.php';

require get_template_directory() . '/inc/customizer/options/option-sociallinks.php';

require get_template_directory() . '/inc/customizer/options/option-other.php';