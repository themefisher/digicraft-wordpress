<?php
/**
 * digicraft functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package digicraft
 */
if ( ! function_exists( 'digicraft_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function digicraft_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on digicraft, use a find and replace
     * to change 'digicraft' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'digicraft', get_template_directory() . '/languages' );

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
        'primary' => esc_html__( 'Primary', 'digicraft' ),
        'secondary' => esc_html__( 'Secondary', 'digicraft' ),
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
    add_theme_support( 'custom-background', apply_filters( 'digicraft_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'digicraft_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digicraft_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'digicraft_content_width', 640 );
}
add_action( 'after_setup_theme', 'digicraft_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// register_sidebar( array(
//     'name'          => __( 'EDD Sidebar', 'digicraft' ),
//     'id'            => 'sidebar-edd',
//     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//     'after_widget'  => '</aside>',
//     'before_title'  => '<h4 class="widget-title">',
//     'after_title'   => '</h4>',
// ) );

/**
 * Enqueue scripts and styles.
 */
function digicraft_scripts() {
    wp_enqueue_style( 'digicraft-style', get_stylesheet_uri() );
    wp_enqueue_style( 'digicraft-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'digicraft-fonts', get_template_directory_uri().'/assets/css/themefisher-font.css' );
//    wp_enqueue_style( 'digicraft-main.css', get_template_directory_uri().'/assets/css/style.css' );
    wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri().'/assets/css/owl.carousel.css' );
    wp_enqueue_style( 'swift-main.css', get_template_directory_uri().'/assets/css/style.css' );
    wp_enqueue_script( 'digicraft-bootstrap.min.js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'owl.carousel.min.js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '20120206', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'digicraft_scripts' );
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








//TMG Plugin for plugin activation
if ( file_exists(  __DIR__ . '/inc/tmg/class-tgm-plugin-activation.php' ) ) {
	require_once  __DIR__ . '/inc/tmg/class-tgm-plugin-activation.php';
}

if( file_exists(__DIR__ . '/inc/shortcodes.php')) {
    require_once __DIR__ . '/inc/shortcodes.php' ;
};

if(file_exists(__DIR__ . '/inc/edd_customization.php')){
    require_once __DIR__ . '/inc/edd_customization.php';
}
if(file_exists(__DIR__ . '/inc/elementor-functions.php')){
    require_once __DIR__ . '/inc/elementor-functions.php';
}

//TMG Plugin for plugin activation
if ( file_exists(  __DIR__ . '/inc/elements.php' ) ) {
	require_once  __DIR__ . '/inc/elements.php';
}


//TMG Plugin Settings
add_action( 'tgmpa_register', 'tf_swift_register_required_plugins' );
function tf_swift_register_required_plugins() {

	$plugins = array(
		array(
			'name'      => 'Easy Digital Downloads',
			'slug'      => 'easy-digital-downloads',
			'required'  => true,
		),
		array(
			'name'      => 'Elementor Page Builder',
			'slug'      => 'elementor',
			'required'  => true,
		),
        array(
            'name'      => 'Contact Form',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'DW Question Answer',
            'slug'      => 'dw-question-answer',
            'required'  => false,
        ),

	);

	$config = array(
		'id'           => 'digicraft',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}






// Customizer Color Settings
// $primary_color = get_theme_mod('angel_color_scheme_settings');

function digicraft_customizer_css()
{
  ?>
    <style type="text/css">
      
.btn-main, input[type="submit"], .btn-main-sm, .btn-live-preview, .post-comments .comment-form input[type="submit"], .edd-submit.button.blue , .page-title   {
  background: <?php echo get_theme_mod('digicraft_color_scheme_settings');  ?>
}


.footerInfo , .main-menu .sub-menu , .navbar-default .navbar-toggle , .woocommerce .woocommerce-MyAccount-navigation li.is-active a , .mc4wp-form-fields input[type="submit"] , .woocommerce .form-row input[type='submit'] , .blogSidebar .widget .widget-title , .product .woocommerce-tabs .tabs li.active a , .navbar-default .navbar-toggle:hover , .woocommerce .woocommerce-MyAccount-navigation li.is-active a:hover , .main-slider , .woocommerce-tabs .tabs li.active a{
  border-color: <?php echo get_theme_mod('digicraft_color_scheme_settings');  ?>
}


.product-item .product-meta .price ,.product-item .product-meta .author i , .post .post-meta ul li a:hover{ 
  color: <?php echo get_theme_mod('digicraft_color_scheme_settings');   ?>;
}

/*hover color*/
.top-footer li a:hover {
    color: <?php echo get_theme_mod('digicraft_color_scheme_settings');  ?>;
}

  </style>
  <?php
}
add_action( 'wp_head', 'digicraft_customizer_css');