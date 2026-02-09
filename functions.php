<?php
/**
 * Bus Rent Dhaka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bus_Rent_Dhaka
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bus_rent_dhaka_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bus Rent Dhaka, use a find and replace
		* to change 'bus-rent-dhaka' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bus-rent-dhaka', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bus-rent-dhaka' ),
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
			'bus_rent_dhaka_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bus_rent_dhaka_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bus_rent_dhaka_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bus_rent_dhaka_content_width', 640 );
}
add_action( 'after_setup_theme', 'bus_rent_dhaka_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bus_rent_dhaka_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bus-rent-dhaka' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bus-rent-dhaka' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bus_rent_dhaka_widgets_init' );

function bus_rent_dhaka_scripts() {

	// Main stylesheet (style.css)
	wp_enqueue_style(
		'bus-rent-dhaka-style',
		get_stylesheet_uri(),
		array(),
		_S_VERSION
	);

	// Custom stylesheet
	wp_enqueue_style(
		'bus-rent-dhaka-custom',
		get_template_directory_uri() . '/assets/css/custom.css',
		array( 'bus-rent-dhaka-style' ), // dependency
		'1.0.0',
		'all'
	);

	// RTL support
	wp_style_add_data( 'bus-rent-dhaka-style', 'rtl', 'replace' );

	// Navigation script
	wp_enqueue_script(
		'bus-rent-dhaka-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		_S_VERSION,
		true
	);

	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bus_rent_dhaka_scripts' );


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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function getIcon($name, $dir = '', $is_img = false) {
  if (!filter_var($name, FILTER_VALIDATE_URL) === false) {
    return file_get_contents( $name );
  }else{
    if($dir){
        if ($dir == 'img') {
            if ($is_img) {
                return '<img alt="'.$name.'" src="'.get_stylesheet_directory_uri() . '/assets/'.$dir.'/'.$name.'.svg" />';
            }else{
                return file_get_contents(get_stylesheet_directory() . "/assets/".$dir."/$name.svg");
            }
            
        }
    }else{
      return file_get_contents(get_stylesheet_directory() . "/assets/icons/$name.svg");
    }
  }
}

function busicon_short_code($atts) {
	ob_start();
	if( $atts['name'] ){
		echo '<span class="scy-icon">' . getIcon($atts['name']) . '</span>';
	}
	return ob_get_clean();
}
add_shortcode('scyicon', 'busicon_short_code');