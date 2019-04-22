<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Post Page
$wp_customize->add_section( 'mocho_blog_postpage_options', array(
	'title'			=> esc_html__( 'Post Page', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_advance_customization',
) );

// Option - Enable Related Posts
$wp_customize->add_setting( 'mocho_blog_enable_related_posts', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_related_posts'],
) );

$wp_customize->add_control( 'mocho_blog_enable_related_posts', array(
	'label'				=> esc_html__( 'Enable Related Posts', 'mocho-blog' ),
	'section'			=> 'mocho_blog_postpage_options',
	'type'				=> 'checkbox',
) );

// Option - Related Posts Section Title
$wp_customize->add_setting( 'mocho_blog_related_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['mocho_blog_related_section_title'],
) );

$wp_customize->add_control( 'mocho_blog_related_section_title', array(
	'label'				=> esc_html__( 'Related Section Title', 'mocho-blog' ),
	'section'			=> 'mocho_blog_postpage_options',
	'type'				=> 'text',
	'active_callback'   => 'mocho_blog_is_active_related_posts',
) );

// Option - Related Posts Number
$wp_customize->add_setting( 'mocho_blog_related_post_no', array(
	'sanitize_callback'		=> 'mocho_blog_sanitize_number',
	'default'				=> $defaults['mocho_blog_related_post_no'], 
) ); 

$wp_customize->add_control( 'mocho_blog_related_post_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'mocho-blog' ),
	'section'				=> 'mocho_blog_postpage_options',
	'type'					=> 'number',
	'active_callback'   => 'mocho_blog_is_active_related_posts',
) );


// Option - Enable Author Info
$wp_customize->add_setting( 'mocho_blog_enable_author_section', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_author_section'],
) );

$wp_customize->add_control( 'mocho_blog_enable_author_section', array(
	'label'				=> esc_html__( 'Enable Author Info', 'mocho-blog' ),
	'section'			=> 'mocho_blog_postpage_options',
	'type'				=> 'checkbox',
) );