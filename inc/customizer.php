<?php
/**
 * digicraft Theme Customizer.
 *
 * @package digicraft
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function digicraft_customize_register( $wp_customize ) {

$wp_customize->remove_control("header_image");
$wp_customize->remove_section("colors");
$wp_customize->remove_section("background_image");
$wp_customize->remove_section("static_front_page");
$wp_customize->remove_section("title_tagline");
$wp_customize->remove_section("nav");


 $wp_customize->add_section('digicraft_color_scheme', array(
        'title' => __('Site Color Scheme','digicraft'),
        'priority' => 6,
    ));
 
  $wp_customize->add_setting('digicraft_color_scheme_settings',array(
          'default'     => '#fff',
          'transport' => 'refresh', // or postMessage
        )
    );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'      => __( 'Site Color Scheme', 'digicraft' ),
    'section'    => 'digicraft_color_scheme',
    'settings'   => 'digicraft_color_scheme_settings',
    )
  )
);
 


    $wp_customize->add_section('digicraft_logo', array(
      	'title' => __('Site Logo','digicraft'),
      	'priority' => 10
    ));
 
	$wp_customize->add_setting('digicraft_site_logo',array(
          'default'     => '',
          'transport' => 'refresh', // or postMessage
        )
    );
 
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'digicraft_site_logo',
           array(
               'label'      => __( 'Upload a logo', 'theme_name' ),
               'section'    => 'digicraft_logo',
               'settings'   => 'digicraft_site_logo',
           )
       )
   );

   

	// Footer settings start
	$wp_customize -> add_section('digicraft_footer_section', array(
   		'title' => __('Footer Settings','digicraft'),
   		'priority'	=> 30
   	));

   $wp_customize -> add_setting('footer_copyright_text',array(
   		'default'	=> '',
   		'transport' => 'refresh'
   	));
	$wp_customize-> add_control('footer_copyright_text_control',array(
   		'label'	=>	'Footer Copyright Text',
   		'type'	=>	'textarea',
   		'settings'	=>	'footer_copyright_text',
   		'section'	=>	'digicraft_footer_section'
	));
	// end footer settings


}
add_action( 'customize_register', 'digicraft_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function digicraft_customize_preview_js() {
	wp_enqueue_script( 'digicraft_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'digicraft_customize_preview_js' );
