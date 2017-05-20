<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Theme Options',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Swift Marketplace Theme Options <small>by themefisher</small>',
);

// ------------------------------
// Others  Settings
// ------------------------------
$options[]   = array(
	'name'     => 'others',
	'title'    => 'Site Settings',
	'icon'     => 'fa fa-globe',
	'fields'   => array(

		array(
			'id'      => 'site_logo',
			'type'    => 'upload',
			'title'   => 'Site Logo',
		),

		array(
			'id'        => 'title_typography',
			'type'      => 'typography',
			'title'     => 'Title Font',
			'default'   => array(
				'family'  => 'Open Sans',
				'variant' => '800',
				'font'    => 'google', // this is helper for output
			),
		),
		array(
			'id'        => 'body_typography',
			'type'      => 'typography',
			'title'     => 'Body Font',
			'default'   => array(
				'family'  => 'Open Sans',
				'variant' => '800',
				'font'    => 'google', // this is helper for output
			),
		),
	)
);

// Slider Settings
// ------------------------------
$options[]   = array(
	'name'     => 'slider_settings',
	'title'    => 'Banner',
	'icon'     => 'fa fa-sliders',
	'fields'   => array(

		array(
			'id'      => 'slider_heading',
			'type'    => 'text',
			'title'   => 'Slider Heading',
		),
		array(
			'id'      => 'slider_description',
			'type'    => 'textarea',
			'title'   => 'Slider Description',
		),
		array(
			'id'      => 'slider_img',
			'type'    => 'upload',
			'title'   => 'Slider Image',
		),
		array(
			'id'      => 'slider_button',
			'type'    => 'text',
			'title'   => 'slider_button_link',
		),




	)
);

// ------------------------------
// Testimonial Section                     -
// ------------------------------
$options[]   = array(
	'name'     => 'testimonial_section',
	'title'    => 'Testimonial',
	'icon'     => 'fa fa-commenting',
	'fields'   => array(

		array(
			'id'      => 'testimonial_switcher',
			'type'    => 'switcher',
			'title'   => 'Enable Section',
			'label'   => 'Do you want to show this section or not ?',
		),


		array(
			'id'              => 'testimonial_item',
			'type'            => 'group',
			'title'           => 'Testimonial Item',
			'button_title'    => 'Add New Testimonial',
			'accordion_title' => 'Add New Testimonial',
			'fields'          => array(

				array(
					'id'          => 'testimonial_user',
					'type'        => 'text',
					'title'       => 'Testimonial User',
				),
				array(
					'id'          => 'testimonial_designation',
					'type'        => 'text',
					'title'       => 'Testimonial Designation',
				),
				array(
					'id'          => 'testimonial_image',
					'type'        => 'upload',
					'title'       => 'Testimonial Image',
				),

				array(
					'id'          => 'testimonial_message',
					'type'        => 'textarea',
					'title'       => 'Testimonial User Message',
				),

			)
		),

	)
);

// ------------------------------
// Feature Section                     -
// ------------------------------
$options[]   = array(
	'name'     => 'service_section',
	'title'    => 'Service',
	'icon'     => 'fa fa-life-ring',
	'fields'   => array(

		array(
			'id'      => 'service_switcher',
			'type'    => 'switcher',
			'title'   => 'Enable Section',
			'label'   => 'Do you want to show this section or not ?',
		),


		array(
			'id'              => 'service_item_group',
			'type'            => 'group',
			'title'           => 'Feature Item',
			'button_title'    => 'Add New Feature',
			'accordion_title' => 'Add New Feature',
			'fields'          => array(

				array(
					'id'          => 'service_title',
					'type'        => 'text',
					'title'       => 'Feature Title',
				),
				array(
					'id'          => 'service_icon',
					'type'        => 'icon',
					'title'       => 'Feature Icon',
				),
				array(
					'id'          => 'service_desc',
					'type'        => 'textarea',
					'title'       => 'Feature Message',
				),

			)
		),

	)
);

// ------------------------------
// Subscription Section                     -
// ------------------------------
$options[]   = array(
	'name'     => 'subscription_section',
	'title'    => 'Subscription',
	'icon'     => 'fa fa-envelope',
	'fields'   => array(

		array(
			'id'      => 'subscription_switcher',
			'type'    => 'switcher',
			'title'   => 'Enable Section',
			'label'   => 'Do you want to show this section or not ?',
		),
		array(
			'id'      => 'subscription_title',
			'type'    => 'text',
			'title'   => 'Subscription Title',
		),
		array(
			'id'      => 'subscription_desc',
			'type'    => 'textarea',
			'title'   => 'Subscription Description',
		),
		array(
			'id'      => 'subscription_shortcode',
			'type'    => 'textarea',
			'title'   => 'Subscription Shortcode',
		),




	)
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => 'Backup',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'You can save your current options. Download a Backup and Import.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);



CSFramework::instance( $settings, $options );
