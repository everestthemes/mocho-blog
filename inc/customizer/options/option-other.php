<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Other
$wp_customize->add_section( 'mocho_blog_other_options', array(
	'title'			=> esc_html__( 'Other Options', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_advance_customization',
) );

// Option - Enable Breadcrumb
$wp_customize->add_setting( 'mocho_blog_enable_breadcrumb', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_breadcrumb'],
) );

$wp_customize->add_control( 'mocho_blog_enable_breadcrumb', array(
	'label'				=> esc_html__( 'Enable Breadcrumb', 'mocho-blog' ),
	'section'			=> 'mocho_blog_other_options',
	'type'				=> 'checkbox',
) );

// Option - Default Excerpt Length
$wp_customize->add_setting( 'mocho_blog_excerpt_length', array(
	'sanitize_callback'		=> 'mocho_blog_sanitize_number',
	'default'				=> $defaults['mocho_blog_excerpt_length'], 
) );

$wp_customize->add_control( 'mocho_blog_excerpt_length', array(
	'label'					=> esc_html__( 'Excerpt Length', 'mocho-blog' ),
	'description'			=> esc_html__( 'Excerpt is the short post content. Excerpt length sets the number of words that the excerpt can contain. This is the default excerpt length used for other pages too.', 'mocho-blog' ),
	'section'				=> 'mocho_blog_other_options',
	'type'					=> 'number',
) );