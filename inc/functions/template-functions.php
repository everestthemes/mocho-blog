<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mocho_Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if( !function_exists( 'mocho_blog_body_classes' ) ) {
	function mocho_blog_body_classes( $classes ) {

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar' ) ) {
			$classes[] = 'no-sidebar';
		}

		if( get_background_image() || get_background_color() != 'ffffff'  ) {
			$classes[] = 'boxed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'mocho_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if( !function_exists( 'mocho_blog_pingback_header' ) ) {
	function mocho_blog_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
}
add_action( 'wp_head', 'mocho_blog_pingback_header' );


/**
 * Class for container listing posts in index.php
 */
if( !function_exists( 'mocho_blog_post_list_class' ) ) {

	function mocho_blog_post_list_class() {

		$sidebar_position = mocho_blog_get_sidebar_position();

		$container_class = null;

		if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {

			$container_class = 'col-md-12 col-sm-12 col-xs-12';
		} else {
			$container_class = 'col-md-8 col-sm-12 col-xs-12';
		}

		return $container_class;
	}
}


/**
 * Class for main container listing posts in index.php
 */
if( !function_exists( 'mocho_blog_main_post_list_class' ) ) {

	function mocho_blog_main_post_list_class() {

		$sidebar_position = mocho_blog_get_sidebar_position();

		$container_class = null;

		if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {

			$container_class = 'no_sidebar';
		}

		return $container_class;
	}
}

/**
 * Class for main container displaying content of post and page
 */
if( !function_exists( 'mocho_blog_post_page_container_class' ) ) {

	function mocho_blog_post_page_container_class() {

    	$sidebar_position = mocho_blog_get_sidebar_position();

    	$container_class = '';
    	
		if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
			$container_class = 'col-md-12 col-sm-12 col-xs-12';
		} else {
			$container_class = 'col-md-8 col-sm-12 col-xs-12';
		}

		return $container_class;
	}
}


/**
 * Pagination Layouts according to customizer's pagination value
 */
if( !function_exists( 'mocho_blog_pagination_layout' ) ) {

	function mocho_blog_pagination_layout() {
		?>
		<div class="mb_pagination">
	        <div class="pagi_style3">
	            <?php
	            	the_posts_pagination( array(
	            		'mid_size' => 3,
						'prev_text' => esc_html__( 'Prev', 'mocho-blog' ),
						'next_text' => esc_html__( 'Next', 'mocho-blog' ),
	            	) );
	            ?>
	        </div><!-- .pagi_style3 -->
	    </div><!-- .mb_pagination -->
	    <?php
	}
}