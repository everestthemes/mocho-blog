<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Social Links
$wp_customize->add_section( 'mocho_blog_social_link_options', array(
	'title'			=> esc_html__( 'Social Links', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_advance_customization',
) );

// Option - Facebook Link
$wp_customize->add_setting( 'mocho_blog_facebook_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_facebook_link'],
) );

$wp_customize->add_control( 'mocho_blog_facebook_link', array(
	'label'				=> esc_html__( 'Facebook Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Twitter Link
$wp_customize->add_setting( 'mocho_blog_twitter_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_twitter_link'],
) );

$wp_customize->add_control( 'mocho_blog_twitter_link', array(
	'label'				=> esc_html__( 'Twitter Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Google Plus Link
$wp_customize->add_setting( 'mocho_blog_google_plus_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_google_plus_link'],
) );

$wp_customize->add_control( 'mocho_blog_google_plus_link', array(
	'label'				=> esc_html__( 'Google Plus Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Pinterest Link
$wp_customize->add_setting( 'mocho_blog_pinterest_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_pinterest_link'],
) );

$wp_customize->add_control( 'mocho_blog_pinterest_link', array(
	'label'				=> esc_html__( 'Pinterest Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Instagram Link
$wp_customize->add_setting( 'mocho_blog_instagram_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_instagram_link'],
) );

$wp_customize->add_control( 'mocho_blog_instagram_link', array(
	'label'				=> esc_html__( 'Instagram Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - VK Link
$wp_customize->add_setting( 'mocho_blog_vk_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_vk_link'],
) );

$wp_customize->add_control( 'mocho_blog_vk_link', array(
	'label'				=> esc_html__( 'VK Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );

// Option - Youtube Link
$wp_customize->add_setting( 'mocho_blog_youtube_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['mocho_blog_youtube_link'],
) );

$wp_customize->add_control( 'mocho_blog_youtube_link', array(
	'label'				=> esc_html__( 'Youtube Link', 'mocho-blog' ),
	'section'			=> 'mocho_blog_social_link_options',
	'type'				=> 'url',
) );