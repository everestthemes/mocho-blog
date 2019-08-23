<?php
/**
 * Custom Hooks
 *
 * @package Mocho_Blog
 */

if( !function_exists( 'mocho_blog_main_menu_action' ) ) {
    /**
     * Hook - Main Menu
     *
     * @since 1.0.0
     */
    function mocho_blog_main_menu_action() {
        ?>
        <div class="primary_navigation has_search">
            <?php
            wp_nav_menu( array( 
                'theme_location'    => 'main-menu',
                'container'         => '',
                'fallback_cb'       => 'mocho_blog_navigation_fallback',
             ) );
            ?>
        </div><!-- .primary_navigation -->
        <?php
    }
}
add_action( 'mocho_blog_main_menu', 'mocho_blog_main_menu_action', 1 );


if( !function_exists( 'mocho_blog_menu_search_action' ) ) {
	/**
     * Hook - Main Menu
     *
     * @since 1.0.0
     */
	function mocho_blog_menu_search_action() {
        $enable_header_search = mocho_blog_get_option( 'mocho_blog_enable_header_search' );
        if( $enable_header_search == true ) {
            ?>
            <div class="header_search">
                <?php get_search_form(); ?>
            </div><!-- .header_search -->
            <?php
        }
	}
}
add_action( 'mocho_blog_menu_search', 'mocho_blog_menu_search_action', 1 );


if( !function_exists( 'mocho_blog_header_menu_action' ) ) {
	/**
     * Hook - Header Menu
     *
     * @since 1.0.0
     */
	function mocho_blog_header_menu_action() {
		if( has_nav_menu( 'header-menu' ) ) :
			?>
			<div class="col nav_col">
				<div class="secondary_nav">
		            <?php
	            	wp_nav_menu( array( 
	        			'theme_location' 	=> 'header-menu',
	        			'container'			=> '',
                        'depth'             => 1,
	        		 ) );
		            ?>
		        </div><!-- .secondary_nav -->
		    </div><!-- .col.nav_col -->
			<?php
		endif;
	}
}
add_action( 'mocho_blog_header_menu', 'mocho_blog_header_menu_action', 1 );


if( !function_exists( 'mocho_blog_header_social_links_action' ) ) {
	/**
     * Hook - Header Social Links
     *
     * @since 1.0.0
     */
	function mocho_blog_header_social_links_action() {
		?>
		<div class="col">
            <div class="header_extra">
                <div class="social">
                    <ul class="social_icons_list">
                    	<?php 
                        $facebook_link = mocho_blog_get_option( 'mocho_blog_facebook_link' );
                        if( !empty( $facebook_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php
                        $twitter_link = mocho_blog_get_option( 'mocho_blog_twitter_link' );
                        if( !empty( $twitter_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $googleplus_link = mocho_blog_get_option( 'mocho_blog_google_plus_link' );
                        if( !empty( $googleplus_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $googleplus_link ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $pinterest_link = mocho_blog_get_option( 'mocho_blog_pinterest_link' );
                        if( !empty( $pinterest_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $instagram_link = mocho_blog_get_option( 'mocho_blog_instagram_link' );
                        if( !empty( $instagram_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $vk_link = mocho_blog_get_option( 'mocho_blog_vk_link' );
                        if( !empty( $vk_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php 
                        $youtube_link = mocho_blog_get_option( 'mocho_blog_youtube_link' );
                        if( !empty( $youtube_link ) ) : ?>
                        <li><a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                    </ul><!-- .social_icons_list -->
                </div><!-- .social_icons -->
            </div><!-- .header_extra -->
        </div><!-- .col -->
		<?php
	}
}
add_action( 'mocho_blog_header_social_links', 'mocho_blog_header_social_links_action', 1 );


if( !function_exists( 'mocho_blog_logo_action' ) ) {
    /**
     * Hook - Logo
     *
     * @since 1.0.0
     */
    function mocho_blog_logo_action() {
        ?>
        <div class="site_idty_entry">
            <div class="logo">
                <?php if( has_custom_logo() ) : the_custom_logo(); else : ?>
                <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
                <?php 
                $mocho_blog_description = get_bloginfo( 'description', 'display' );
                if ( $mocho_blog_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo esc_html( $mocho_blog_description ); /* WPCS: xss ok. */ ?></p>
                <?php endif; endif; ?>
            </div><!-- .logo -->
        </div><!-- .site_idty_entry -->
        <?php
    }
}
add_action( 'mocho_blog_logo', 'mocho_blog_logo_action', 1 );

if( !function_exists( 'mocho_blog_breadcrumb_action' ) ) {
	/**
     * Hook - Breadcrumb
     *
     * @since 1.0.0
     */
	function mocho_blog_breadcrumb_action() {

        $enable_breadcrumb = mocho_blog_get_option( 'mocho_blog_enable_breadcrumb' );

        if( $enable_breadcrumb == 1 ) {
            ?>
            <div class="mb_breadcrumb breadtrails_style3">
                <?php
                    $breadcrumb_args = array(
                        'show_browse' => false,
                    );
                    mocho_blog_breadcrumb_trail( $breadcrumb_args );
                ?>
            </div><!-- .mb_breadcrumb.breadtrails_style3 -->
            <?php
        }
		?>
		<?php
	}
}
add_action( 'mocho_blog_breadcrumb', 'mocho_blog_breadcrumb_action', 1 );


if( !function_exists( 'mocho_blog_copyright_text_action' ) ) {
	/**
     * Hook - Copyright Text
     *
     * @since 1.0.0
     */
	function mocho_blog_copyright_text_action() {

		$copyright_text = mocho_blog_get_option( 'mocho_blog_copyright_text' );
		?>
		<div class="col left_col">
            <div class="copyright">
                <p>
                    <?php 
                    if( !empty( $copyright_text ) ) {
                        /* translators: 1: Copyright Text, 2: Theme Name, 3:  Theme Author URL. */
                        printf( esc_html__( '%1$s %2$s Theme By %3$s ', 'mocho-blog' ), $copyright_text, 'Mocho Blog', '<a href="' . esc_url( 'https://everestthemes.com' ) . '" target="_blank">' . esc_html__( 'EverestThemes', 'mocho-blog') . '</a>' );
                    } else {
                        /* translators: 1: Theme Author URL. */
                        printf( esc_html__( '%1$s Theme By %2$s ', 'mocho-blog' ), 'Mocho Blog', '<a href="' . esc_url( 'https://everestthemes.com' ) . '" target="_blank">' . esc_html__( 'EverestThemes', 'mocho-blog') . '</a>' );
                    }
                    ?>
                </p>
            </div><!-- .copyright -->
        </div><!-- .col.left_col -->
		<?php
	}
}
add_action( 'mocho_blog_copyright_text', 'mocho_blog_copyright_text_action', 1 );


if( !function_exists( 'mocho_blog_footer_menu_action' ) ) {
	/**
     * Hook - Footer Menu
     *
     * @since 1.0.0
     */
	function mocho_blog_footer_menu_action() {

		if( has_nav_menu( 'footer-menu' ) ) :
			?>
			<div class="col right_col">
				<div class="footer_nav">
		            <?php
	            	wp_nav_menu( array( 
	        			'theme_location' 	=> 'footer-menu',
	        			'container'			=> '',
                        'depth'             => 1,
	        		 ) );
		            ?>
		        </div><!-- .footer_nav -->
		    </div><!-- .col.right_col -->
			<?php
		endif;
	}
}
add_action( 'mocho_blog_footer_menu', 'mocho_blog_footer_menu_action', 1 );