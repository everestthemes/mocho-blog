<?php
/**
 * Mocho Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mocho_Blog
 */

if ( ! function_exists( 'mocho_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mocho_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mocho Blog, use a find and replace
		 * to change 'mocho-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mocho-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'mocho-blog-thubmnail-1', 800, 500, true ); // Grid/List Large Thumbnail/ Author Thumbnail
		add_image_size( 'mocho-blog-thubmnail-2', 707, 442, true ); // Grid/List Small/ Related Posts
		add_image_size( 'mocho-blog-thubmnail-3', 300, 300, true ); // Widget Post Thumbnail
		add_image_size( 'mocho-blog-thubmnail-4', 1140, 500, true ); // Banner Image Thumbnail


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'mocho-blog' ),
			'header-menu' => esc_html__( 'Top Header Menu', 'mocho-blog' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'mocho-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mocho_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mocho_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mocho_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mocho_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'mocho_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mocho_blog_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mocho-blog' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget"><div class="%2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'mocho-blog' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<div class="col-md-4 col-sm-12 col-xs-12"><div id="%1$s" class="widget"><div class="%2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_widget( 'Mocho_Blog_Author_Widget' );

	register_widget( 'Mocho_Blog_Post_Widget' );
}
add_action( 'widgets_init', 'mocho_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mocho_blog_scripts() {
	
	wp_enqueue_style( 'mocho-blog-style', get_stylesheet_uri() );

	wp_enqueue_style( 'mocho-blog-font', mocho_blog_fonts_url() );

	wp_enqueue_style( 'mocho-blog-main', get_template_directory_uri() . '/assets/dist/css/main.css' );

	wp_enqueue_script( 'mocho-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'mocho-blog-bundle', get_template_directory_uri() . '/assets/dist/js/bundle.min.js', array( 'jquery', 'masonry' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mocho_blog_scripts' );


/**
 * Enqueue admin scripts and styles.
 */
function mocho_blog_admin_scripts() {

	wp_enqueue_style( 'mocho-blog-admin', get_template_directory_uri() . '/assets/admin/css/admin.css' );

	wp_enqueue_script( 'media-upload' );

	wp_enqueue_media();

	wp_enqueue_script( 'mocho-blog-admin', get_template_directory_uri() . '/assets/admin//js/admin.js', array( 'jquery' ), '20151215', true );
}
add_action( 'admin_enqueue_scripts', 'mocho_blog_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/functions/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/functions/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/functions/template-functions.php';

/**
 * Breadcrumbs.
 */
require get_template_directory() . '/inc/functions/breadcrumbs.php';


/**
 * TGM Plugin Activation.
 */
require get_template_directory() . '/inc/functions/class-tgm-plugin-activation.php';

/**
 * Extra Functions.
 */
require get_template_directory() . '/inc/functions/extras.php';

/**
 * Custom Hooks
 */
require get_template_directory() . '/inc/functions/hooks.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Dynamic CSS.
 */
require get_template_directory() . '/inc/customizer/dynamic.php';

/**
 * Custom Field for Post.
 */
require get_template_directory() . '/inc/metabox/class-mocho-blog-post-meta.php';

/**
 * Custom Author Widget.
 */
require get_template_directory() . '/inc/widgets/class-mocho-blog-author-widget.php';

/**
 * Custom Post Widget.
 */
require get_template_directory() . '/inc/widgets/class-mocho-blog-post-widget.php';

/**
 * Customizer Active Callback.
 */
require get_template_directory() . '/inc/customizer/active-callback.php';