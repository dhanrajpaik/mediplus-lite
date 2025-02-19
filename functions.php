<?php
/**
 * mediplus-lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mediplus-lite
 */

if ( ! defined( '_MEDILITE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_MEDILITE_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mediplus_lite_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mediplus-lite, use a find and replace
		* to change 'mediplus-lite' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mediplus-lite', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'main menu', 'mediplus-lite' ),
			'menu-2' => esc_html__( 'Footer', 'mediplus-lite' ),
			'top-bar' => esc_html__( 'Top Bar', 'mediplus-lite' ),
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
			'mediplus_lite_custom_background_args',
			array(
				'default-color' => 'ffffff',
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
			'height'      => 250,   // Maximum logo height in pixels.
			'width'       => 250,   // Maximum logo width in pixels.
			'flex-width'  => true,  // Allow flexible width (logo can scale).
			'flex-height' => true,  // Allow flexible height (logo can scale).
		)
	);
}
add_action( 'after_setup_theme', 'mediplus_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mediplus_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mediplus_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'mediplus_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mediplus_lite_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mediplus-lite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mediplus-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mediplus_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mediplus_lite_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'mediplus-lite-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap', array(), null );

    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'mediplus-lite-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0' );

    // Enqueue Nice Select CSS
    wp_enqueue_style( 'mediplus-lite-nice-select', get_template_directory_uri() . '/css/nice-select.css', array(), '1.0.0' );

    // Enqueue Font Awesome CSS
    wp_enqueue_style( 'mediplus-lite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );

    // Enqueue icofont CSS
    wp_enqueue_style( 'mediplus-lite-icofont', get_template_directory_uri() . '/css/icofont.css', array(), '1.0.0' );

    // Enqueue Slicknav CSS
    wp_enqueue_style( 'mediplus-lite-slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0' );

    // Enqueue Owl Carousel CSS
    wp_enqueue_style( 'mediplus-lite-owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css', array(), '1.0.0' );

    // Enqueue Datepicker CSS
    wp_enqueue_style( 'mediplus-lite-datepicker', get_template_directory_uri() . '/css/datepicker.css', array(), '1.0.0' );

    // Enqueue Animate CSS
    wp_enqueue_style( 'mediplus-lite-animate', get_template_directory_uri() . '/css/animate.min.css', array(), '1.0.0' );

    // Enqueue Magnific Popup CSS
    wp_enqueue_style( 'mediplus-lite-magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0.0' );

    // Enqueue Medipro CSS
    wp_enqueue_style( 'mediplus-lite-normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0' );
    wp_enqueue_style( 'mediplus-lite-style', get_stylesheet_uri(), array(), _MEDILITE_VERSION );
    wp_enqueue_style( 'mediplus-lite-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0' );

    // Enqueue Bootstrap JS
    wp_enqueue_script( 'mediplus-lite-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

    // Enqueue Nice Select JS
    wp_enqueue_script( 'mediplus-lite-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), '1.0.0', true );

    // Enqueue Slicknav JS
    wp_enqueue_script( 'mediplus-lite-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true );

    // Enqueue Owl Carousel JS
    wp_enqueue_script( 'mediplus-lite-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );

    // Enqueue Datepicker JS
    wp_enqueue_script( 'mediplus-lite-datepicker', get_template_directory_uri() . '/js/datepicker.min.js', array('jquery'), '1.0.0', true );

    // Enqueue Magnific Popup JS
    wp_enqueue_script( 'mediplus-lite-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );

    // Enqueue Main JS
    wp_enqueue_script( 'mediplus-lite-main', get_template_directory_uri() . '/js/main.js', array('jquery'), _MEDILITE_VERSION, true );

    // Enqueue Navigation JS
    wp_enqueue_script( 'mediplus-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _MEDILITE_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mediplus_lite_scripts' );






/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


require get_template_directory() . '/inc/customizer.php';

