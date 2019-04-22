<?php
/**
 * Customizer Options Choices
 *
 * @package Mocho_Blog
 */

if( !function_exists( 'mocho_blog_categories_array' ) ) {
	/*
	 * Function to get blog categories
	 */
	function mocho_blog_categories_array() {

		$taxonomy = 'category';

		$terms = get_terms( $taxonomy );

		$blog_cat = array();

		foreach( $terms as $term ) {
			$blog_cat[$term->term_id] = $term->name;
		}

		return $blog_cat;
	}
}
