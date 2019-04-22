<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mocho_Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="page_wrap">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mocho-blog' ); ?></a>

	<?php
	$enable_top_header = mocho_blog_get_option( 'mocho_blog_enable_top_header' );
	?>
	<header id="mastheader" class="mastheader header_style3">
		<?php
		if( $enable_top_header == true ) {
			?>
			<div class="header_top">
		        <div class="mb_container">
		            <div class="header_top_entry">
		                <div class="row">
		                    <?php 
		                    /**
		                     * Hook - mocho_blog_header_menu.
		                     *
		                     * @hooked mocho_blog_header_menu_action - 1
		                     */
		                    do_action( 'mocho_blog_header_menu' ); 

		                    /**
		                     * Hook - mocho_blog_header_social_links.
		                     *
		                     * @hooked mocho_blog_header_social_links_action - 1
		                     */
		                    do_action( 'mocho_blog_header_social_links' ); 
		                    ?>
		                </div><!-- .row -->
		            </div><!-- .header_top_entry -->
		        </div><!-- .mb_container -->
		    </div><!-- .header_top -->
			<?php
		}
		?>
	    <div class="site_idty_wrap">
	        <div class="mb_container">
	           <?php 
	            /**
	             * Hook - mocho_blog_logo.
	             *
	             * @hooked mocho_blog_logo_action - 1
	             */
	            do_action( 'mocho_blog_logo' ); 
	            ?>
	        </div><!-- .mb_container -->
	    </div><!-- .site_idty_wrap -->
	    <nav class="main_navigation">
	        <div class="mb_container">
	            <?php 
	            /**
	             * Hook - mocho_blog_main_menu.
	             *
	             * @hooked mocho_blog_main_menu_action - 1
	             */
	            do_action( 'mocho_blog_main_menu' ); 
	            ?>
	            <?php 
	            /**
	             * Hook - mocho_blog_menu_search.
	             *
	             * @hooked mocho_blog_menu_search_action - 1
	             */
	            do_action( 'mocho_blog_menu_search' ); 
	            ?>
	        </div><!-- .mb_container -->
	    </nav><!-- .main_navigation -->
	</header><!-- #mastheader.mastheader.header_style3 -->
