<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mocho_Blog
 */
$enable_social_links = mocho_blog_get_option( 'mocho_blog_enable_footer_social_links' );

?>
	<footer class="footer dark <?php if( !empty( $footer_style ) ) { echo esc_attr( $footer_style ); } ?>">
        <div class="mb_container">
        	<?php if( $enable_social_links == true ) : ?>
            <div class="mb_topfooter">
                <div class="social">
                    <ul class="social_icons_list">
                    	<?php 
                        $facebook_link = mocho_blog_get_option( 'mocho_blog_facebook_link' );
                        if( !empty( $facebook_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i> <?php esc_html_e( 'Facebook', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php
                        $twitter_link = mocho_blog_get_option( 'mocho_blog_twitter_link' );
                        if( !empty( $twitter_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i> <?php esc_html_e( 'Twitter', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $googleplus_link = mocho_blog_get_option( 'mocho_blog_google_plus_link' );
                        if( !empty( $googleplus_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $googleplus_link ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i> <?php esc_html_e( 'Google +', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $pinterest_link = mocho_blog_get_option( 'mocho_blog_pinterest_link' );
                        if( !empty( $pinterest_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i> <?php esc_html_e( 'Pinterest', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $instagram_link = mocho_blog_get_option( 'mocho_blog_instagram_link' );
                        if( !empty( $instagram_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i> <?php esc_html_e( 'Instagram', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $vk_link = mocho_blog_get_option( 'mocho_blog_vk_link' );
                        if( !empty( $vk_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i> <?php esc_html_e( 'Vk', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    	<?php 
                        $youtube_link = mocho_blog_get_option( 'mocho_blog_youtube_link' );
                        if( !empty( $youtube_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i> <?php esc_html_e( 'Youtube', 'mocho-blog' ); ?></a></li>
                        <?php endif; ?>
                    </ul><!-- .social_icons_list -->
                </div><!-- .social -->
            </div><!-- .mb_topfooter -->
        	<?php endif; ?>
        	<?php if( is_active_sidebar( 'footer' ) ) : ?>
            <div class="mb_midfooter">
                <div class="row">
                	<?php dynamic_sidebar( 'footer' ); ?>
                </div><!-- .row -->
            </div><!-- .mb_midfooter -->
        	<?php endif; ?>
        </div><!-- .mb_container -->
        <?php 
        $copyright_text = mocho_blog_get_option( 'mocho_blog_copyright_text' );
        if( !empty( $copyright_text ) || has_nav_menu( 'footer-menu' ) ) : 
            ?>
            <div class="mb_bottomfooter">
                <div class="mb_container">
                    <div class="row">
                    	<?php 
                    	/**
                         * Hook - mocho_blog_copyright_text.
                         *
                         * @hooked mocho_blog_copyright_text_action - 1
                         */
                        do_action( 'mocho_blog_copyright_text' ); 

                    	/**
                         * Hook - mocho_blog_footer_menu.
                         *
                         * @hooked mocho_blog_footer_menu_action - 1
                         */
                        do_action( 'mocho_blog_footer_menu' ); 
                    	?>
                    </div>
                    <!-- // row -->
                </div>
                <!-- // mb_container -->
            </div><!-- .mb_bottomfooter -->
            <?php 
        endif; 
        ?>
    </footer><!-- .footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
