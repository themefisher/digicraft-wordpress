<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elements Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Eventas_Elements {


	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}


	private function includes() {
        $element_files = glob( get_template_directory() . '/inc/elementor/*.php');

        foreach ($element_files as $file) {
            require $file;
        }
	}


	private function register_widget() {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Blog_Post() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Price_Table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_MailChimp() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Testimonial_Carousel() );
	}
}

new Eventas_Elements();
