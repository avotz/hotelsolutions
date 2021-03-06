<?php
/**
 * hotelsolutions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hotelsolutions
 */

if ( ! function_exists( 'hotelsolutions_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hotelsolutions_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hotelsolutions, use a find and replace
	 * to change 'hotelsolutions' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hotelsolutions', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'header' => esc_html__( 'Header menu', 'hotelsolutions' ),
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
	add_theme_support( 'custom-background', apply_filters( 'hotelsolutions_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'hotelsolutions_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotelsolutions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hotelsolutions_content_width', 640 );
}
add_action( 'after_setup_theme', 'hotelsolutions_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hotelsolutions_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hotelsolutions' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hotelsolutions' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hotelsolutions_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hotelsolutions_scripts() {
	wp_enqueue_style( 'hotelsolutions-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'hotelsolutions-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'hotelsolutions-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'hotelsolutions-bundle', get_template_directory_uri() . '/js/bundle.js', array(), '20170608', true );
}
add_action( 'wp_enqueue_scripts', 'hotelsolutions_scripts' );

add_filter( 'nav_menu_link_attributes', 'hotelsolutions_contact_menu_atts', 10, 3 );
function hotelsolutions_contact_menu_atts( $atts, $item, $args )
{
  // The ID of the target menu item
  $menu_target_cont = 105;
  $menu_target_curr = 297;
  // inspect $item
  if ($item->ID == $menu_target_cont) {
    $atts['data-toggle'] = 'modal';
    $atts['data-target'] = '#modal1';
  }
  if ($item->ID == $menu_target_curr) {
    $atts['class'] = 'btn btn-oscuro';
  }
  return $atts;
}

function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '2dc54a8dfa9489';
  $phpmailer->Password = '95bc1229416301';
}

add_action('phpmailer_init', 'mailtrap');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom post type file.
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Load custom post type file.
 */
require get_template_directory() . '/inc/post-process.php';

