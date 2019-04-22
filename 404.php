<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mocho_Blog
 */

get_header();
?>
	<div class="mb_container">
        <div class="mid_portion_wrap no_sidebar error_page_mid_wrap">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="errorpage_entry">
                                <div class="error_head">
                                    <h2><?php esc_html_e( '404', 'mocho-blog' ); ?></h2>
                                    <h3><?php esc_html_e( 'Error page not found!', 'mocho-blog' ); ?></h3>
                                </div><!-- .error_head -->
                                <div class="error_message">
                                    <p><?php esc_html_e( 'The page you are looking for either has moved or doesn&rsquo;t exists in this server. Go back to homepage.', 'mocho-blog' ); ?></p>
                                </div><!-- .error_message -->
                                <div class="error_action">
                                    <div class="the_permalink">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn_general"><?php esc_html_e( 'Go Homepage', 'mocho-blog' ); ?></a>
                                    </div><!-- .the_permalink -->
                                </div><!-- .error_action -->
                            </div><!-- .errorpage_entry -->
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div><!-- .col-* -->
            </div><!-- .row -->
        </div><!-- .mid_portion_wrap.no_sidebar.error_page_mid_wrap -->
    </div><!-- .mb_container -->

<?php
get_footer();
