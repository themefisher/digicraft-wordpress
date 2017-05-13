<?php
/**
 * themefisher functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themefisher
 */
if ( ! function_exists( 'themefisher_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themefisher_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on themefisher, use a find and replace
     * to change 'themefisher' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'themefisher', get_template_directory() . '/languages' );

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
        'primary' => esc_html__( 'Primary', 'themefisher' ),
        'secondary' => esc_html__( 'Secondary', 'themefisher' ),
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
    /*
     * Enable support for Post Formats.
     * See https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ) );
    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'themefisher_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'themefisher_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themefisher_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'themefisher_content_width', 640 );
}
add_action( 'after_setup_theme', 'themefisher_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function themefisher_scripts() {
    wp_enqueue_style( 'themefisher-style', get_stylesheet_uri() );
    wp_enqueue_style( 'themefisher-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'themefisher-fonts', get_template_directory_uri().'/assets/css/themefisher-font.css' );
    wp_enqueue_style( 'themefisher-main.css', get_template_directory_uri().'/assets/css/style.css' );
    wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri().'/assets/css/owl.carousel.css' );
    wp_enqueue_style( 'swift-main.css', get_template_directory_uri().'/assets/css/swift-style.css' );

    wp_enqueue_script( 'themefisher-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );
    wp_enqueue_script( 'themefisher-bootstrap.min.js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'themefisher-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );
    wp_enqueue_script( 'smooth-', get_template_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'owl.carousel.min.js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'themefisher-main-js', get_template_directory_uri() . '/assets/js/javascript-main.js', array('jquery'), '20120206', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'themefisher_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**l
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
// Initialize CMB Meta Box the metabox class
if ( file_exists(  __DIR__ . '/libs/cmb/init.php' ) ) {
  require_once  __DIR__ . '/libs/cmb/init.php';
} elseif ( file_exists(  __DIR__ . '/libs/CMB/init.php' ) ) {
  require_once  __DIR__ . '/libs/CMB/init.php';
}
add_filter( 'cmb2_meta_boxes', 'tf_meta_box' );
function tf_meta_box( array $meta_boxes ) {
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_tf_';
    /**
     * Product Post type meta box
     */
    $meta_boxes['tf_meta_box'] = array(
        'id'            => 'download',
        'title'         => __( 'Theme Info', 'cmb2' ),
        'object_types'  => array( 'download', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'fields'        => array(
            array(
                'name'       => __( 'Template Title', 'cmb2' ),
                'id'         => $prefix . 'template_title',
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Template Description', 'cmb2' ),
                'id'         => $prefix . 'template_des',
                'type'       => 'textarea',
            ),
            array(
                'name'       => __( 'Template Big Thumbnail Image', 'cmb2' ),
                'id'         => $prefix . 'template_img',
                'type'       => 'file',
            ),
           
            array(
                'name'       => __( 'Demo Url', 'cmb2' ),
                'id'         => $prefix . 'demo_url',
                'type'       => 'text_url',
            ),
            array(
                'name'       => __( 'Last Update', 'cmb2' ),
                'id'         => $prefix . 'last_update',
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Technology Used', 'cmb2' ),
                'id'         => $prefix . 'technology_used',
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Product Version', 'cmb2' ),
                'id'         => $prefix . 'product_version',
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Browsers', 'cmb2' ),
                'id'         => $prefix . 'browsers',
                'type'       => 'text',
            ),
            array(
                'name'       => __( 'Product Type', 'cmb2' ),
                'id'         => $prefix . 'item_type',
                'type'       => 'text',
            ),
            
        ),
    );

    // Add other metaboxes as needed
    return $meta_boxes;
}






// remove the standard button that shows after the download's content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

/**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */
function themeblvd_disable_admin_bar() {
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action( 'after_setup_theme', 'themeblvd_disable_admin_bar' );
 
/**
 * Redirect back to homepage and not allow access to
 * WP admin for Subscribers.
 */
function themeblvd_redirect_admin(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;      
    }
}
add_action( 'admin_init', 'themeblvd_redirect_admin' );





// Edd If product price is zero then it will show free
function pw_format_currency( $formatted, $currency, $price ) {
    if( ! is_admin() && $price == 0.00 ) {
        return 'Free';
    }
        return $formatted;
}
add_filter( 'edd_usd_currency_filter_before', 'pw_format_currency', 10, 3 );