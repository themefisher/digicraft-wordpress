<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Digicraft Testimonial Carousel
 *
 * DigiCraft widget for Testimonial Carousel.
 *
 * @since 1.0.0
 */
class Widget_Features extends Widget_Base
{

	public function get_name()
	{
		return 'Features';
	}

	public function get_title()
	{
		return __('Features', 'DigiCraft');
	}

	public function get_icon()
	{
		return 'eicon-info-box';
	}

	public function get_categories()
	{
		return ['digicraft'];
	}



	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_tab',
			[
				'label' => __('Features', 'DigiCraft'),
			]
		);

		$this->add_control(
			'features',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'feaure_icon',
						'label' => __('Name', 'DigiCraft'),
						'type' => Controls_Manager::TEXT,
					],
					[
                        'name'=> 'service_icon',
						'label' => __( 'Social Icon', 'DigiCraft' ),
						'type' => Controls_Manager::ICON,
					],

						[
						'name' => 'feature_desc',
						'label' => __('Description', 'DigiCraft'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => __('Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat.', 'DigiCraft'),
						'placeholder' => __('Job', 'DigiCraft'),
					],
				],
			]
		);


		$this->end_controls_section();

	}

	protected function render()
	{
		$features = $this->get_settings('features');

		?>
        <div id="services" class="clearfix" >
			<?php foreach ($features as $feature) : ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item text-center">
                        <i class="<?php echo $feature['service_icon']  ?>"></i>
                        <h4><?php echo $feature['feaure_icon']; ?></h4>
                        <p><?php echo $feature['feature_desc']   ?></p>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>


		<?php
	}

	protected function _content_template() { }
}