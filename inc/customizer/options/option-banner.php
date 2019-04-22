<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Banner
$wp_customize->add_section( 'mocho_blog_banner_options', array(
	'title'			=> esc_html__( 'Banner Section', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_homepage_customization',
) );

// Option - Enable Banner Section
$wp_customize->add_setting( 'mocho_blog_enable_banner', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_banner'],
) );

$wp_customize->add_control( 'mocho_blog_enable_banner', array(
	'label'				=> esc_html__( 'Enable Banner Section', 'mocho-blog' ),
	'section'			=> 'mocho_blog_banner_options',
	'type'				=> 'checkbox',
) );

// Option - Banner Posts Category
$wp_customize->add_setting( 'mocho_blog_banner_post_categories', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_choices',
	'default' => $defaults['mocho_blog_banner_post_categories'],
) );

$wp_customize->add_control( new Mocho_Blog_Dropdown_Multiple_Select( $wp_customize, 'mocho_blog_banner_post_categories', array(
	'label'				=> esc_html__( 'Select Post Category/Categories', 'mocho-blog' ),
	'description'		=> esc_html__( 'Select one or more than one categories', 'mocho-blog' ),
	'section'			=> 'mocho_blog_banner_options',
	'type'				=> 'select',
	'choices'			=> mocho_blog_categories_array(),
	'active_callback'	=> 'mocho_blog_is_active_banner',
) ) );

// Option - Banner Posts Number
$wp_customize->add_setting( 'mocho_blog_banner_post_no', array(
	'sanitize_callback'		=> 'mocho_blog_sanitize_number',
	'default'				=> $defaults['mocho_blog_banner_post_no'], 
) ); 

$wp_customize->add_control( 'mocho_blog_banner_post_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'mocho-blog' ),
	'section'				=> 'mocho_blog_banner_options',
	'type'					=> 'number',
	'active_callback'	=> 'mocho_blog_is_active_banner',
) );

// Option - Banner Button Title
$wp_customize->add_setting( 'mocho_blog_banner_button_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['mocho_blog_banner_button_title'],
) );

$wp_customize->add_control( 'mocho_blog_banner_button_title', array(
	'label'				=> esc_html__( 'Button Title', 'mocho-blog' ),
	'section'			=> 'mocho_blog_banner_options',
	'type'				=> 'text',
	'active_callback'	=> 'mocho_blog_is_active_banner',
) );