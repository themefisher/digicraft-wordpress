<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'DigiCarft Options',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'DigiCraft Marketplace Theme Options <small>by themefisher</small>',
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
