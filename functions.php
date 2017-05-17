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
//    wp_enqueue_style( 'themefisher-main.css', get_template_directory_uri().'/assets/css/style.css' );
    wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri().'/assets/css/owl.carousel.css' );
    wp_enqueue_style( 'swift-main.css', get_template_directory_uri().'/assets/css/style.css' );
    wp_enqueue_style( 'theme-font-awesome', get_template_directory_uri() . '/libs/cs-framework/assets/css/font-awesome.css' );

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


//Codestar Fromwork Added
if ( file_exists(  __DIR__ . '/libs/cs-framework/cs-framework.php' ) ) {
	require_once  __DIR__ . '/libs/cs-framework/cs-framework.php';
}

//TMG Plugin for plugin activation
if ( file_exists(  __DIR__ . '/libs/tmg/class-tgm-plugin-activation.php' ) ) {
	require_once  __DIR__ . '/libs/tmg/class-tgm-plugin-activation.php';
}



//EDD Fucntions

// remove the standard button that shows after the download's content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );
// our own function to output the button
function swift_purchase_link_text( $download_id ) {
	if ( ! get_post_meta( $download_id, '_edd_hide_purchase_link', true ) ) {
		echo edd_get_purchase_link(
			array(
				'download_id' 	=> $download_id,
				'class' 	=> 'edd-submit', // add your new classes here
				'price' 	=> 0 // turn the price off
			)
		);
	}
}
// rehook/add our function back to the same location as before
add_action( 'edd_after_download_content', 'swift_purchase_link_text' );



//TMG Plugin Settings
add_action( 'tgmpa_register', 'tf_swift_register_required_plugins' );
function tf_swift_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'Easy Digital Downloads',
			'slug'      => 'easy-digital-downloads',
			'required'  => true,
		),
		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => true,
		),



	);

	$config = array(
		'id'           => 'tf-swift',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'tf-swift' ),
			'menu_title'                      => __( 'Install Plugins', 'tf-swift' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'tf-swift' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'tf-swift' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'tf-swift' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'tf-swift'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'tf-swift'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'tf-swift'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'tf-swift'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'tf-swift'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'tf-swift'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'tf-swift'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'tf-swift'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'tf-swift'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'tf-swift' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'tf-swift' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'tf-swift' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'tf-swift' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'tf-swift' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'tf-swift' ),
			'dismiss'                         => __( 'Dismiss this notice', 'tf-swift' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'tf-swift' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tf-swift' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}