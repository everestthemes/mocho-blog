<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Sidebar
$wp_customize->add_section( 'mocho_blog_sidebar_options', array(
	'title'			=> esc_html__( 'Sidebar', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_advance_customization',
) );

// Option - Sidebar Position
$wp_customize->add_setting( 'mocho_blog_global_sidebar_position', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_select',
	'default'			=> $defaults['mocho_blog_global_sidebar_position'],
) );

$wp_customize->add_control( 'mocho_blog_global_sidebar_position', array(
	'label'				=> esc_html__( 'Global Sidebar Position', 'mocho-blog' ),
	'section'			=> 'mocho_blog_sidebar_options',
	'type'				=> 'select',
	'choices'			=> array(
		'left' => esc_html__( 'Left Sidebar', 'mocho-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'mocho-blog' ),
		'none' => esc_html__( 'No Sidebar', 'mocho-blog' ),
	),
) );