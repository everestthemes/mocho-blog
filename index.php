<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mocho_Blog
 */

	get_header();

	$enable_banner = mocho_blog_get_option( 'mocho_blog_enable_banner' );

	$banner_categories = mocho_blog_get_option( 'mocho_blog_banner_post_categories' );
        
    $banner_posts_no = mocho_blog_get_option( 'mocho_blog_banner_post_no' );

    $banner_button_title = mocho_blog_get_option( 'mocho_blog_banner_button_title' );

    if( empty( $banner_button_title ) ) {
    	$banner_button_title = esc_html__( 'View Detail', 'mocho-blog' );
    }

    $banner_args = array(
        'post_type' => 'post',
    );

    if( !empty( $banner_categories ) ) {
        $banner_args['cat'] = $banner_categories;
    }

    if( absint( $banner_posts_no ) > 0 ) {
        $banner_args['posts_per_page'] = absint( $banner_posts_no );
    } else {
    	$banner_args['posts_per_page'] = 3;
    }

    $banner_query = new WP_Query( $banner_args );
    
	if( ( $banner_query->have_posts() ) && ( $enable_banner == true ) ) {
	    ?>
	    <section class="mb_banner">
	        <div class="mb_container">
	            <div class="owl-carousel mb_banner_style_1">
	                <?php while( $banner_query->have_posts() ) : $banner_query->the_post(); ?>
	                <?php if( has_post_thumbnail() ) : ?>
	                <div class="item">
	                    <div class="card">
	                        <div class="post_thumb">
	                            <?php the_post_thumbnail( 'mocho-blog-thubmnail-4', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
	                            <div class="card_content">
	                                <?php mocho_blog_post_categories(); ?>
	                                <div class="post_title">
	                                    <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
	                                </div><!-- .title -->
	                                <?php
	                                $button_title = get_theme_mod( 'mocho_blog_banner_button_title', 'Read More' );
	                                if( !empty( $button_title ) ) {
	                                    ?>
	                                    <div class="the_permalink">
	                                        <a class="btn_general" href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html( $button_title ); ?></a>
	                                    </div><!-- .the_permalink -->
	                                    <?php
	                                }
	                                ?>
	                            </div><!-- .card_content -->
	                            <div class="mask"></div><!-- .mask -->
	                        </div><!-- .post_thumb -->
	                    </div><!-- .card -->
	                </div><!-- .item -->
	                <?php endif; ?>
	                <?php endwhile; wp_reset_postdata(); ?>
	            </div><!-- .owl-carousel -->
	        </div><!-- .mb_container -->
	    </section><!-- .mb_banner -->
	    <?php
	}


	$enable_featured_section = mocho_blog_get_option( 'mocho_blog_enable_featured_post' );

	$featured_catgories = mocho_blog_get_option( 'mocho_blog_featured_post_categories' );

    $featured_posts_no = mocho_blog_get_option( 'mocho_blog_featured_post_no' );

    $featured_args = array(
        'post_type' => 'post',
    );

    if( !empty( $featured_catgories ) ) {
        $featured_args['cat'] = $featured_catgories;
    }

    if( absint( $featured_posts_no ) > 0 ) {
        $featured_args['posts_per_page'] = absint( $featured_posts_no );
    } else {
    	$featured_args['posts_pre_page'] = 5;
    }

    $featured_query = new WP_Query( $featured_args );

	if( ( $featured_query->have_posts() ) && ( $enable_featured_section == true ) ) {
	    ?>
	    <div class="mb_container">
		    <div class="mb_featured featured_style_3">
		        <div class="owl-carousel mb_featuredpost_carousel">
		            <?php while( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
		            <div class="item">
		                <div class="card">
		                    <?php if( has_post_thumbnail() ) : ?>
		                    <div class="post_thumb imghover">
		                        <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail( 'mocho-blog-thubmnail-2', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
		                    </div><!-- .post_thumb.imghover -->
		                    <?php endif; ?>
		                    <div class="card_content">
		                        <?php mocho_blog_post_categories(); ?>
		                        <div class="post_title">
		                            <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
		                        </div><!-- .post_title -->
		                        <div class="meta">
		                            <ul class="post_meta">
		                                <li class="posted_date"><?php esc_html_e( 'On - ', 'mocho-blog' ); ?><a href="<?php esc_url( the_permalink() ); ?>"><?php echo get_the_date(); ?></a></li>
		                            </ul><!-- .post_meta -->
		                        </div><!-- .meta -->
		                    </div><!-- .card_content -->
		                </div><!-- .card -->
		            </div><!-- .item -->
		            <?php endwhile; wp_reset_postdata(); ?>
		        </div><!-- .owl-carousel.mb_featuredpost_carousel -->
		    </div><!-- .mb_featured.featured_style_3 -->
	    </div><!-- .mb_container -->
	    <?php
	}
	?>
	<div class="mb_container">
		<div class="mid_portion_wrap frontpage_mid_wrap <?php echo esc_attr( mocho_blog_main_post_list_class() ); ?>">
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
	                        <?php
							if( have_posts() ) {

								if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar' ) ) {
									
									get_template_part( 'template-parts/layout/layout', 'masonry' );

								} else {

									get_template_part( 'template-parts/layout/layout', 'masonryfull' );
								}							

							} else {

								get_template_part( 'template-parts/content', 'none' );

							}
							?>
						</main><!-- #main.site-main -->
					</div><!-- #primary.content-area -->
				</div><!--  -->
				<?php
				if( $sidebar_position == 'right' && is_active_sidebar( 'sidebar' ) ) {
            		get_sidebar();
            	}
				?>
			</div><!-- .row -->
		</div><!-- .mid_portion_wrap.frontpage_mid_wrap -->
	</div><!-- .mb_container -->

	<?php

get_footer();
