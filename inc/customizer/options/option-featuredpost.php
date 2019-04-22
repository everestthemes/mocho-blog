<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Featured
$wp_customize->add_section( 'mocho_blog_featured_options', array(
	'title'			=> esc_html__( 'Featured Section', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_homepage_customization',
) );

// Option - Enable Featured Section
$wp_customize->add_setting( 'mocho_blog_enable_featured_post', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_featured_post'],
) );

$wp_customize->add_control( 'mocho_blog_enable_featured_post', array(
	'label'				=> esc_html__( 'Enable Featured Section', 'mocho-blog' ),
	'section'			=> 'mocho_blog_featured_options',
	'type'				=> 'checkbox',
) );


// Option - Featured Post Category
$wp_customize->add_setting( 'mocho_blog_featured_posts_categories', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_choices',
	'default' => $defaults['mocho_blog_featured_post_categories'],
) );

$wp_customize->add_control( new Mocho_Blog_Dropdown_Multiple_Select( $wp_customize, 'mocho_blog_featured_posts_categories', array(
	'label'				=> esc_html__( 'Select Post Category/Categories', 'mocho-blog' ),
	'description'		=> esc_html__( 'Select one or more than one categories', 'mocho-blog' ),
	'section'			=> 'mocho_blog_featured_options',
	'type'				=> 'select',
	'choices'			=> mocho_blog_categories_array(),
	'active_callback'	=> 'mocho_blog_is_active_featured',
) ) );

// Option - Featured Posts Number
$wp_customize->add_setting( 'mocho_blog_featured_post_no', array(
	'sanitize_callback'		=> 'mocho_blog_sanitize_number',
	'default'				=> $defaults['mocho_blog_featured_post_no'], 
) ); 

$wp_customize->add_control( 'mocho_blog_featured_post_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'mocho-blog' ),
	'section'				=> 'mocho_blog_featured_options',
	'type'					=> 'number',
	'active_callback'	=> 'mocho_blog_is_active_featured',
) );