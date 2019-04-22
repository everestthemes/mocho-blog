<?php
/**
 * Extra Functions
 *
 * @package Mocho_Blog
 */

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'mocho_blog_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function mocho_blog_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'mocho-blog')) {
            $fonts[] = 'Poppins:400,400i,500,500i,600,600i,700,700i';
        }
        
        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Lato font: on or off', 'mocho-blog')) {
            $fonts[] = 'Lato:400,400i,700,700i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;


/**
 * Fallback For Main Menu
 */
if ( !function_exists( 'mocho_blog_navigation_fallback' ) ) :

    function mocho_blog_navigation_fallback() {
        ?>
        <ul>
            <?php 
                wp_list_pages( array( 
                    'title_li' => '', 
                    'depth' => 1,
                ) ); 
            ?>
        </ul>
        <?php    
    }
endif;


if ( ! function_exists( 'mocho_blog_get_option' ) ) {

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function mocho_blog_get_option( $key ) {

           if ( empty( $key ) ) {
            return;
        }

        $value = '';

        $default = mocho_blog_get_default_theme_options();

        $default_value = null;

        if ( is_array( $default ) && isset( $default[ $key ] ) ) {
            $default_value = $default[ $key ];
        }

        if ( null !== $default_value ) {
            $value = get_theme_mod( $key, $default_value );
        }
        else {
            $value = get_theme_mod( $key );
        }

        return $value;
    }
}


if ( ! function_exists( 'mocho_blog_get_default_theme_options' ) ) {

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function mocho_blog_get_default_theme_options() {

        $defaults = array();

        $defaults['mocho_blog_enable_banner'] = false;
        $defaults['mocho_blog_banner_post_categories'] = '';
        $defaults['mocho_blog_banner_post_no'] = 3;
        $defaults['mocho_blog_banner_button_title'] = esc_html__( 'View Detail', 'mocho-blog' );

        $defaults['mocho_blog_enable_featured_post'] = false;
        $defaults['mocho_blog_featured_post_categories'] = '';
        $defaults['mocho_blog_featured_post_no'] = 5;

        $defaults['mocho_blog_enable_top_header'] = false;
        $defaults['mocho_blog_enable_header_search'] = false;

        $defaults['mocho_blog_enable_footer_social_links'] = false;
        $defaults['mocho_blog_copyright_text'] = esc_html__( 'COPYRIGHT &copy; 2018. ALL RIGHTS RESERVED.', 'mocho-blog' );

        $defaults['mocho_blog_enable_related_posts'] = false;
        $defaults['mocho_blog_related_section_title'] = esc_html__( 'You may also like...', 'mocho-blog' );
        $defaults['mocho_blog_related_post_no'] = 4;
        $defaults['mocho_blog_enable_author_section'] = false;

        $defaults['mocho_blog_facebook_link'] = '';
        $defaults['mocho_blog_twitter_link'] = '';
        $defaults['mocho_blog_google_plus_link'] = '';
        $defaults['mocho_blog_pinterest_link'] = '';
        $defaults['mocho_blog_instagram_link'] = '';
        $defaults['mocho_blog_vk_link'] = '';
        $defaults['mocho_blog_youtube_link'] = '';

        $defaults['mocho_blog_global_sidebar_position'] = 'right';

        $defaults['mocho_blog_enable_breadcrumb'] = false;
        $defaults['mocho_blog_excerpt_length'] = 20;

        return $defaults;
    }
}


if( !function_exists( 'mocho_blog_get_sidebar_position' ) ) {

    function mocho_blog_get_sidebar_position() {

        $sidebar_position = '';
        
        if( is_home() || is_archive() || is_search() ) {
            $sidebar_position = mocho_blog_get_option( 'mocho_blog_global_sidebar_position' );
        }

        if( is_single() || is_page() ) {
            $sidebar_position = get_post_meta( get_the_ID(), 'mocho_blog_sidebar_position', true );
        }

        if( empty( $sidebar_position ) ) {
            $sidebar_position = 'right';
        }
        
        return $sidebar_position;
    }
}




/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'mocho_blog_excerpt_more' ) ) :
    /*
     * Excerpt More
     */
    function mocho_blog_excerpt_more( $more ) {

        if ( is_admin() ) {

            return $more;
        }

        return '...';
    }
endif;
add_filter( 'excerpt_more', 'mocho_blog_excerpt_more' );


if( !function_exists( 'mocho_blog_excerpt_length' ) ) :
    /*
     * Excerpt More
     */
    function mocho_blog_excerpt_length( $length ) {

        if( is_admin() ) {

            return $length;
        }

        $excerpt_length = mocho_blog_get_option( 'mocho_blog_excerpt_length' );

        if ( absint( $excerpt_length ) > 0 ) {
            $excerpt_length = absint( $excerpt_length );
        }

        return $excerpt_length;
    }
endif;
add_filter( 'excerpt_length', 'mocho_blog_excerpt_length' );


/**
 * Filters For Search Form
 *
 */
if( !function_exists( 'mocho_blog_search_form' ) ) :
    /**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
    function mocho_blog_search_form() {
        $form = '<form role="search" method="get" id="search-form" class="clearfix" action="' . esc_url( home_url( '/' ) ) . '"><input type="search" name="s" placeholder="' . esc_attr__( 'Type Something', 'mocho-blog' ) . '" value"' . get_search_query() . '" ><input type="submit" id="submit" value="'. esc_attr__( 'Search', 'mocho-blog' ).'"></form>';

        return $form;
    }
endif;
add_filter( 'get_search_form', 'mocho_blog_search_form', 10 );


/*
 * Hook - Plugin Recommendation
 */
if ( ! function_exists( 'mocho_blog_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function mocho_blog_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Everest Toolkit', 'mocho-blog' ),
                'slug'     => 'everest-toolkit',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;
add_action( 'tgmpa_register', 'mocho_blog_recommended_plugins' );