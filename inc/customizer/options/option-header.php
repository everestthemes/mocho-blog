<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'mocho_blog_header_options', array(
	'title'			=> esc_html__( 'Header', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_advance_customization',
) );

// Option - Enable Top Header Section
$wp_customize->add_setting( 'mocho_blog_enable_top_header', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_top_header'],
) );

$wp_customize->add_control( 'mocho_blog_enable_top_header', array(
	'label'				=> esc_html__( 'Enable Top Header Section', 'mocho-blog' ),
	'section'			=> 'mocho_blog_header_options',
	'type'				=> 'checkbox',
) );

// Option - Enable Header Search
$wp_customize->add_setting( 'mocho_blog_enable_header_search', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_header_search'],
) );

$wp_customize->add_control( 'mocho_blog_enable_header_search', array(
	'label'				=> esc_html__( 'Enable Header Search', 'mocho-blog' ),
	'section'			=> 'mocho_blog_header_options',
	'type'				=> 'checkbox',
) );