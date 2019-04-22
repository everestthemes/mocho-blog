<?php
/**
 * Active Callback Functions For Customizer Options
 *
 * @package Mocho_Blog
 */


/*
 *	Active Callback For Banner
 */
if( ! function_exists( 'mocho_blog_is_active_banner' ) ) {

	function mocho_blog_is_active_banner( $control ) {
		if( $control->manager->get_setting( 'mocho_blog_enable_banner' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}
}

/*
 *	Active Callback For Featured Section
 */
if( ! function_exists( 'mocho_blog_is_active_featured' ) ) {

	function mocho_blog_is_active_featured( $control ) {
		if( $control->manager->get_setting( 'mocho_blog_enable_featured_post' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}
}

/*
 *	Active Callback For Related Posts
 */
if( ! function_exists( 'mocho_blog_is_active_related_posts' ) ) {

	function mocho_blog_is_active_related_posts( $control ) {
		if( $control->manager->get_setting( 'mocho_blog_enable_related_posts' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}