<?php

$defaults = mocho_blog_get_default_theme_options();

// Section - Footer
$wp_customize->add_section( 'mocho_blog_footer_options', array(
	'title'			=> esc_html__( 'Footer', 'mocho-blog' ),
	'panel'			=> 'mocho_blog_advance_customization',
) );

// Option - Enable Footer Social Links
$wp_customize->add_setting( 'mocho_blog_enable_footer_social_links', array(
	'sanitize_callback'	=> 'mocho_blog_sanitize_checkbox',
	'default'			=> $defaults['mocho_blog_enable_footer_social_links'],
) );

$wp_customize->add_control( 'mocho_blog_enable_footer_social_links', array(
	'label'				=> esc_html__( 'Enable Footer Social Links', 'mocho-blog' ),
	'section'			=> 'mocho_blog_footer_options',
	'type'				=> 'checkbox',
) );

// Option - Footer Copyright
$wp_customize->add_setting( 'mocho_blog_copyright_text', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['mocho_blog_copyright_text'],
) );

$wp_customize->add_control( 'mocho_blog_copyright_text', array(
	'label'				=> esc_html__( 'Copyright Text', 'mocho-blog' ),
	'type' 				=> 'text',
	'section'			=> 'mocho_blog_footer_options',
) );