<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Eventas Button
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */

class Widget_MailChimp extends Widget_Base {

    public function get_name() {
        return 'eventas-mailchimp';
    }

    public function get_title() {
        return __( 'MailChimp', 'eventas' );
    }

    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_categories() {
        return [ 'digicraft' ];
    }

    /**
     * A list of scripts that the widgets is depended in
     * @since 1.3.0
     **/
    /*
        public function get_script_depends() {
            return [ 'imagesloaded' ];
        }
    */

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __( 'Content', 'eventas' ),
            ]
        );


        $this->add_control(
            'action',
            [
                'label'       => __( 'Action URL', 'eventas' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Action URL', 'eventas' ),
            ]
        );

        $this->add_control(
            'input_name',
            [
                'label'       => __( 'Input Name', 'eventas' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Input Name', 'eventas' ),
            ]
        );

        $this->add_control(
            'email',
            [
                'label'       => __( 'Email Placeholder', 'eventas' ),
                'type'        => Controls_Manager::TEXT,
                'default' => __( 'Type Your Email', 'eventas' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'eventas' ),
                'type'        => Controls_Manager::TEXT,
                'default' => __( 'Submit', 'eventas' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_form_style',
            [
                'label' => __( 'Form', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );


        $this->add_control(
            'form_background_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .form-control' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'form_border',
                'label' => __( 'Border', 'eventas' ),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eventas-mailchimp .form-control',
            ]
        );

        $this->add_control(
            'form_border_radius',
            [
                'label' => __( 'Border Radius', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button_style',
            [
                'label' => __( 'Button', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __( 'Normal', 'eventas' ),
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Typography', 'eventas' ),
                'selector' => '{{WRAPPER}} .eventas-mailchimp .chimp-btn',
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'button_border',
                'label' => __( 'Border', 'eventas' ),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eventas-mailchimp .chimp-btn',
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_text_padding',
            [
                'label' => __( 'Text Padding', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __( 'Hover', 'eventas' ),
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn:hover' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-mailchimp .chimp-btn:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_hover_animation',
            [
                'label' => __( 'Animation', 'eventas' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

    }

    protected function render() {
        $settings = $this->get_settings();
        ?>

        <form method="post" class="eventas-mailchimp" action="<?php echo $settings['action']; ?>" autocomplete="off" target="_blank" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
            <div class="input-group">
                <input type="email" class="form-control" name="EMAIL" placeholder="<?php echo esc_attr($settings['email']); ?>" required>
                <input type="hidden" name="<?php echo esc_attr($settings['input_name']); ?>">
                <button type="submit" class="chimp-btn" name="subscribe" id="mc-embedded-subscribe"><?php echo esc_html($settings['button_text']); ?> </button>
            </div>
        </form>

    <?php
    }

    protected function _content_template() {
        ?>

        <form method="post" class="eventas-mailchimp" action="{{ settings.action }}" autocomplete="off" target="_blank" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
            <div class="input-group">
                <input type="email" class="form-control" name="EMAIL" placeholder="{{ settings.email }}" required>
                <input type="hidden" name="{{ settings.input_name }}">
                <button type="submit" class="chimp-btn" name="subscribe" id="mc-embedded-subscribe">{{ settings.button_text }}</button>
            </div>
        </form>

    <?php }
}
