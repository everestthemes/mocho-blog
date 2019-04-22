<?php
/**
 * Template part for displaying posts in masonry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mocho_Blog
 */
?>
<div class="recent_posts_holder">
    <?php 
    $i = 0;
    while( have_posts() ) : the_post();
        if( $i < 1 ) {
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class("box first_article"); ?>>
                  <?php if( has_post_thumbnail() ) : ?>
                    <div class="post-thumb imghover">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'mocho-blog-thubmnail-1', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
                    </div><!-- .post-thumb.imghover -->
                <?php endif; ?>

                <div class="first_post_holder">
                <div class="top_box_content">
                    <?php mocho_blog_post_categories(); ?>
                    <div class="post_title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!-- .post_title -->
                    <div class="meta">
                        <ul class="post_meta">
                            <li class="posted_date"><span><?php esc_html_e( 'On - ', 'mocho-blog' ) ?></span><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></li>
                            <li class="posted_by"><span><?php esc_html_e( 'By - ', 'mocho-blog' ); ?></span><a href="<?php the_permalink(); ?>"><?php echo get_the_author(); ?></a></li>
                            </ul><!-- .post_meta -->
                        </ul><!-- .post_meta -->
                    </div><!-- .meta -->
                </div><!-- .top_box_content -->
                <div class="btm_box_content">
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div><!-- .excerpt -->
                </div><!-- .btm_box_content -->
                </div><!-- // first_post_holder -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php
        }
        $i++;
    endwhile;
    ?>

    <div class="mb_rp_brick_grids clearfix mb_post_formates">
        <?php
        $i = 0;
        while( have_posts() ) : the_post(); 
            if( $i >= 1 ) :
                ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class("card bricks_items"); ?>>
                    <?php if( has_post_thumbnail() ) : ?>
                    <div class="post_thumb imghover">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
                    </div><!-- .post_thumb.imghover -->
                    <?php endif; ?>
                    <div class="card_content">
                        <?php mocho_blog_post_categories(); ?>
                        <div class="post_title">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div><!-- .post_title -->
                        <div class="meta">
                            <ul class="post_meta">
                                <li class="posted_date"><span><?php esc_html_e( 'On - ', 'mocho-blog' ) ?></span><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></li>
                                <li class="posted_by"><span><?php esc_html_e( 'By - ', 'mocho-blog' ); ?></span><a href="<?php the_permalink(); ?>"><?php echo get_the_author(); ?></a></li>
                            </ul><!-- .post_meta -->
                            </ul><!-- .post_meta -->
                        </div><!-- .meta -->
                        <div class="excerpt">
                            <?php the_excerpt(); ?>
                        </div><!-- .excerpt -->
                    </div><!-- .card_contents -->
                </div><!-- .card.bricks_items -->
                <?php
            endif;
            $i++;
        endwhile;
        ?>
    </div><!-- .mb_rp_grid_style.clearfix.mb_post_formates -->

    <?php mocho_blog_pagination_layout(); ?>
    
</div>
<!-- // recent_posts_holder -->