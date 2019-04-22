<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mocho_Blog
 */

get_header();
?>
	<div class="mb_container">
        <div class="mid_portion_wrap post_page_mid_wrap">
            <?php 
                /**
                 * Hook - mocho_blog_breadcrumb.
                 *
                 * @hooked mocho_blog_breadcrumb_action - 1
                 */
                do_action( 'mocho_blog_breadcrumb' );
            ?>
            <div class="row">
            	<?php

                $sidebar_position = mocho_blog_get_sidebar_position();

                $container_class = mocho_blog_post_page_container_class();

                if( is_active_sidebar( 'sidebar' ) && $sidebar_position == 'left' ) {
                    get_sidebar();
                }

            	?>
                <div class="<?php echo esc_attr( $container_class ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php
							while ( have_posts() ) :

								the_post();

								get_template_part( 'template-parts/content', 'single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
                        </main>
                    </div>
                    <!-- // primary -->
                </div>
                <?php
                if( is_active_sidebar( 'sidebar' ) && $sidebar_position == 'right' ) {
                    get_sidebar();
                }
                ?>
            </div><!-- .row -->
        </div><!-- .mid_portion_wrap.post_page_mid_wrap -->
    </div><!-- .mb_container -->
<?php
get_footer();
