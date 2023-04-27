<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mocho_Blog
 */

get_header();
?>
	<div class="mb_container">
        <div class="mid_portion_wrap search_page_mid_wrap <?php echo esc_attr( mocho_blog_main_post_list_class() ); ?>">
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
                if( $sidebar_position == 'left' && is_active_sidebar( 'sidebar' ) ) {
                    get_sidebar();
                }
                ?>
                <div class="<?php echo esc_attr( mocho_blog_post_list_class() ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php if ( have_posts() ) : ?>
                            <div class="searchpage_entry">
                                <div class="page_title lined_page_title">
                                    <?php
                                    the_archive_title( '<h2 class="page-title">', '</h2>' );
                                    the_archive_description( '<div class="archive-description">', '</div>' );
                                    ?>
                                </div><!-- .page_title.lined_page_title -->
                                <div class="searchpage_contents_holder">
                                    <div class="searchpage_contents_holder">
                                        <div class="mb_rp_brick_grids clearfix mb_post_formates">
                                            <?php
                                            while( have_posts() ) : the_post(); 
                                                ?>
                                                <div id="post-<?php the_ID(); ?>" <?php post_class("card bricks_items"); ?>>
                                                    <?php if( has_post_thumbnail() ) : ?>
                                                    <div class="post_thumb imghover">
                                                        <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
                                                    </div><!-- .post_thumb.imghover -->
                                                    <?php endif; ?>
                                                    <div class="card_content">
                                                        <?php mocho_blog_post_categories(); ?>
                                                        <div class="post_title">
                                                            <h3><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
                                                        </div><!-- .post_title -->
                                                        <div class="meta">
                                                            <ul class="post_meta">
                                                                <li class="posted_date"><span><?php esc_html_e( 'On - ', 'mocho-blog' ) ?></span><a href="<?php esc_url( the_permalink() ); ?>"><?php echo get_the_date(); ?></a></li>
                                                                <li class="posted_by"><span><?php esc_html_e( 'By - ', 'mocho-blog' ); ?></span><a href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
                                                            </ul><!-- .post_meta -->
                                                            </ul><!-- .post_meta -->
                                                        </div><!-- .meta -->
                                                        <div class="excerpt">
                                                            <?php the_excerpt(); ?>
                                                        </div><!-- .excerpt -->
                                                    </div><!-- .card_contents -->
                                                </div><!-- .card.bricks_items -->
                                                <?php
                                            endwhile;
                                            ?>
                                        </div><!-- .mb_rp_grid_style.clearfix.mb_post_formates -->
                                        <?php mocho_blog_pagination_layout(); ?>
                                    </div><!-- .searchpage_contents_holder -->
                                </div><!-- .searchpage_contents_holder -->
                            </div><!-- .searchpage_entry -->
                            <?php  
                            else :  
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div>
                <?php
                if( $sidebar_position == 'right' && is_active_sidebar( 'sidebar' ) ) {
                    get_sidebar();
                }
                ?>
            </div><!-- .main row -->
        </div><!-- .mid_portion_wrap.search_page_mid_wrap -->
    </div><!-- .mb_container -->

<?php
get_footer();
