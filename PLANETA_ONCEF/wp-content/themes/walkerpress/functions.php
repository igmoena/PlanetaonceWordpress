<?php
/**
 * WalkerPress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WalkerPress
 */

if ( ! defined( 'WALKERPRESS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WALKERPRESS_VERSION', '1.0.6' );
}

if ( ! function_exists( 'walkerpress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function walkerpress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WalkerPress, use a find and replace
		 * to change 'walkerpress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'walkerpress', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'walkerpress' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'walkerpress_custom_background_args',
				array(
					'default-color' => '#e8e8e8',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'walkerpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function walkerpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'walkerpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'walkerpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function walkerpress_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'walkerpress' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'walkerpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'walkerpress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function walkerpress_scripts() {
	wp_enqueue_style('walkerpress-style', get_stylesheet_uri(), array(), WALKERPRESS_VERSION);
	wp_style_add_data('walkerpress-style', 'rtl', 'replace');
	wp_enqueue_style('walkerpress-font-awesome', get_template_directory_uri() . '/css/all.css', '5.15.3');
	wp_enqueue_style('walkerpress-swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.css', '6.5.9');

	wp_enqueue_script( 'walkerpress-font-awesome', get_template_directory_uri() . '/js/all.js', array(), WALKERPRESS_VERSION, true );
	wp_enqueue_script( 'walkerpress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), WALKERPRESS_VERSION, true );
	wp_enqueue_script( 'walkerpress-swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.js', array('jquery'), '6.5.9', true );
	wp_enqueue_script('walkerpress-marquee', get_template_directory_uri() . '/js/jquery.marquee.js', array('jquery'), '', true);
	wp_enqueue_script( 'walkerpress-scripts', get_template_directory_uri() . '/js/walkerpress-scripts.js', array('jquery'), '', true );



	$walkerpress_body_font = esc_html(get_theme_mod('walkerpress_body_fonts'));
	$walkerpress_heading_font = esc_html(get_theme_mod('walkerpress_heading_fonts'));
	

	if( $walkerpress_body_font ) {
		wp_enqueue_style( 'walkerpress-body-fonts', '//fonts.googleapis.com/css?family='. $walkerpress_body_font );
	} else {
		wp_enqueue_style( 'walkerpress-body-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
	}

	if( $walkerpress_heading_font ) {
		wp_enqueue_style( 'walkerpress-headings-fonts', '//fonts.googleapis.com/css?family='. $walkerpress_heading_font );
	} else {
		wp_enqueue_style( 'walkerpress-headings-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'walkerpress_scripts' );

/**
* Enqueue style for dashboard 
*/
function walkerpress_register_admin_styles() {
    if ( is_admin() ) {
    	wp_enqueue_style('walkerpress-dashboard-style', get_template_directory_uri() . '/css/dashboard-styles.css', WALKERPRESS_VERSION );
    	wp_register_style( 'walkerpress-admin-notice-style', get_template_directory_uri() . '/inc/admin/admin-notice.css', false, WALKERPRESS_VERSION );
    	wp_enqueue_style( 'walkerpress-admin-notice-style' );
	}
}
add_action( 'admin_enqueue_scripts', 'walkerpress_register_admin_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * adding themes widgets .
 */
require get_template_directory() . '/inc/widgets/walkerpress-widgets.php';

/**
 * Recommended plugins for this theme.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
*Loading admin notices
*/
require get_template_directory() . '/inc/admin/admin-notice.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/*
**
 * Adds customizable styles to your <head>
 */
if ( ! function_exists( 'walkerpress_dynamic_css' ) ) :
	function walkerpress_dynamic_css(){
		get_template_part('inc/customizer/dynamic-style');

	} 
endif;
add_action( 'wp_head', 'walkerpress_dynamic_css');


/**
 * Theme Breadcrumbs
 */
require get_template_directory() . '/inc/walkerpress-breadcrumbs.php';

if( ! function_exists('walkerpress_filter_archive_title')):
	function walkerpress_filter_archive_title( $title ) {
		return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
	}
endif;
add_filter( 'get_the_archive_title', 'walkerpress_filter_archive_title' );

function walkerpress_set_to_premium() {
	$premium_status = false;
	if ( class_exists( 'Walker_Core' ) ) {
		$WC = new Walker_Core();
		$premium_status = $WC->walker_core_premium_status();
	}
	return $premium_status;

}

/**
Adding Woocommerce support to the theme walkerpress
*/
if ( ! function_exists( 'walkerpress_woocommerce_support' ) ) :
function walkerpress_woocommerce_support() {
    add_theme_support( 'woocommerce' );
} endif;
add_action( 'after_setup_theme', 'walkerpress_woocommerce_support' );

if(class_exists('woocommerce')){
	add_filter('loop_shop_columns', 'walkerpress_alter_woo_columns');
	if (!function_exists('walkerpress_alter_woo_columns')) {
		function walkerpress_alter_woo_columns() {
			return 3;
		}
	}
}