<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mocho_Blog
 */

if ( ! function_exists( 'mocho_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mocho_blog_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on: %s', 'post date', 'mocho-blog' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

	}
endif;

if ( ! function_exists( 'mocho_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function mocho_blog_posted_by() {

		printf(
			/* translators: %s: post author. */
			esc_html_x( 'Posted by: %s', 'post author', 'mocho-blog' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( esc_html( get_the_author() ) ) . '</a>'
		);

	}
endif;


if ( ! function_exists( 'mocho_blog_single_post_categories' ) ) :
	/**
	 * Prints HTML with meta information for the categories
	 */
	function mocho_blog_single_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'mocho-blog' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( esc_html__( 'Posted in: %1$s', 'mocho-blog' ), $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'mocho_blog_single_post_tags' ) ) :
	/**
	 * Prints HTML with meta information for the tags
	 */
	function mocho_blog_single_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'mocho-blog' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="entry_tags"><div class="post_tags">' . esc_html__( ' %1$s', 'mocho-blog' ) . '</div></div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if( ! function_exists( 'mocho_blog_post_categories' ) ) {

	function mocho_blog_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list();
			
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="entry_cats">' . esc_html__( ' %1$s', 'mocho-blog' ) . '</div>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}

}
