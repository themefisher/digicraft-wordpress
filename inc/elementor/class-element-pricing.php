<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Eventas Pricing Table
 *
 * Elementor widget for pricing table.
 *
 * @since 1.0.0
 */

class Widget_Price_Table extends Widget_Base {

    public function get_name() {
        return 'eventas-price-table';
    }

    public function get_title() {
        return __( 'Pricing Table', 'eventas' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'digicraft' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_header',
            [
                'label' => __( 'Header', 'eventas' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __( 'Title', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'I am title', 'eventas' ),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => __( 'Subtitle', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'I am subtitle', 'eventas' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pricing',
            [
                'label' => __( 'Pricing', 'eventas' ),
            ]
        );

        $this->add_control(
            'currency_symbol',
            [
                'label' => __( 'Currency Symbol', 'eventas' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __( 'None', 'eventas' ),
                    'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'eventas' ),
                    'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'eventas' ),
                    'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'eventas' ),
                    'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'eventas' ),
                    'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'eventas' ),
                    'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', 'eventas' ),
                    'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'eventas' ),
                    'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'eventas' ),
                    'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'eventas' ),
                    'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'eventas' ),
                    'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', 'eventas' ),
                    'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'eventas' ),
                    'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'eventas' ),
                    'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'eventas' ),
                    'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'eventas' ),
                    'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'eventas' ),
                    'custom' => __( 'Custom', 'eventas' ),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_symbol_custom',
            [
                'label' => __( 'Custom Symbol', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency_symbol' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => '39.99',
            ]
        );

        $this->add_control(
            'sale',
            [
                'label' => __( 'Sale', 'eventas' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'eventas' ),
                'label_off' => __( 'Off', 'eventas' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'original_price',
            [
                'label' => __( 'Original Price', 'eventas' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '59',
                'condition' => [
                    'sale' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => __( 'Period', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Monthly', 'eventas' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features',
            [
                'label' => __( 'Features', 'eventas' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_text',
            [
                'label' => __( 'Text', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'List Item', 'eventas' ),
            ]
        );

        $repeater->add_control(
            'item_icon',
            [
                'label' => __( 'Icon', 'eventas' ),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-check-circle',
            ]
        );

        $repeater->add_control(
            'item_icon_color',
            [
                'label' => __( 'Icon Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => array_values( $repeater->get_controls() ),
                'default' => [
                    [
                        'item_text' => __( 'List Item #1', 'eventas' ),
                        'item_icon' => 'fa fa-check-circle',
                    ],
                    [
                        'item_text' => __( 'List Item #2', 'eventas' ),
                        'item_icon' => 'fa fa-check-circle',
                    ],
                    [
                        'item_text' => __( 'List Item #3', 'eventas' ),
                        'item_icon' => 'fa fa-check-circle',
                    ],
                ],
                'title_field' => '{{{ item_text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_footer',
            [
                'label' => __( 'Footer', 'eventas' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Click Here', 'eventas' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'eventas' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'footer_additional_info',
            [
                'label' => __( 'Additional Info', 'eventas' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'This is text element', 'eventas' ),
                'rows' => 2,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_ribbon',
            [
                'label' => __( 'Ribbon', 'eventas' ),
            ]
        );

        $this->add_control(
            'show_ribbon',
            [
                'label' => __( 'Show', 'eventas' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'eventas' ),
                'label_off' => __( 'No', 'eventas' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'ribbon_title',
            [
                'label' => __( 'Title', 'eventas' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Popular', 'eventas' ),
                'condition' => [
                    'show_ribbon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'ribbon_horizontal_position',
            [
                'label' => __( 'Horizontal Position', 'eventas' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'eventas' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'eventas' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'condition' => [
                    'show_ribbon' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_header_style',
            [
                'label' => __( 'Header', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'header_bg_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__header' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_padding',
            [
                'label' => __( 'Padding', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_heading_style',
            [
                'label' => __( 'Title', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__heading',
            ]
        );

        $this->add_control(
            'heading_sub_heading_style',
            [
                'label' => __( 'Sub Title', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sub_heading_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__subheading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_heading_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__subheading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pricing_element_style',
            [
                'label' => __( 'Pricing', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'pricing_element_bg_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__price' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_element_padding',
            [
                'label' => __( 'Padding', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__currency, {{WRAPPER}} .eventas-price-table__integer-part, {{WRAPPER}} .eventas-price-table__fractional-part' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__price',
            ]
        );

        $this->add_control(
            'heading_currency_style',
            [
                'label' => __( 'Currency Symbol', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'currency_symbol!' => '',
                ],
            ]
        );

        $this->add_control(
            'currency_size',
            [
                'label' => __( 'Size', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__currency' => 'font-size: calc({{SIZE}}em/100)',
                ],
                'condition' => [
                    'currency_symbol!' => '',
                ],
            ]
        );

        $this->add_control(
            'currency_vertical_position',
            [
                'label' => __( 'Vertical Position', 'eventas' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'eventas' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __( 'Middle', 'eventas' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'eventas' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'top',
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__currency' => 'align-self: {{VALUE}}',
                ],
                'condition' => [
                    'currency_symbol!' => '',
                ],
            ]
        );

        $this->add_control(
            'fractional_part_style',
            [
                'label' => __( 'Fractional Part', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'fractional-part_size',
            [
                'label' => __( 'Size', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__fractional-part' => 'font-size: calc({{SIZE}}em/100)',
                ],
            ]
        );

        $this->add_control(
            'fractional_part_vertical_position',
            [
                'label' => __( 'Vertical Position', 'eventas' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'eventas' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __( 'Middle', 'eventas' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'eventas' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'top',
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__after-price' => 'justify-content: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'heading_original_price_style',
            [
                'label' => __( 'Original Price', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'sale' => 'yes',
                    'original_price!' => '',
                ],
            ]
        );

        $this->add_control(
            'original_price_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__original-price' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'sale' => 'yes',
                    'original_price!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'original_price_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__original-price',
                'condition' => [
                    'sale' => 'yes',
                    'original_price!' => '',
                ],
            ]
        );

        $this->add_control(
            'original_price_vertical_position',
            [
                'label' => __( 'Vertical Position', 'eventas' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'eventas' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __( 'Middle', 'eventas' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'eventas' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
                'default' => 'bottom',
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__original-price' => 'align-self: {{VALUE}}',
                ],
                'condition' => [
                    'sale' => 'yes',
                    'original_price!' => '',
                ],
            ]
        );

        $this->add_control(
            'heading_period_style',
            [
                'label' => __( 'Period', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'period!' => '',
                ],
            ]
        );

        $this->add_control(
            'period_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__period' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'period!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'period_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__period',
                'condition' => [
                    'period!' => '',
                ],
            ]
        );

        $this->add_control(
            'period_position',
            [
                'label' => __( 'Position', 'eventas' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    'below' => __('Below', 'eventas'),
                    'beside' => __('Beside', 'eventas'),
                ],
                'default' => 'below',
                'condition' => [
                    'period!' => '',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features_list_style',
            [
                'label' => __( 'Features', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'features_list_bg_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_list_padding',
            [
                'label' => __( 'Padding', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_list_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_list_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__features-list li',
            ]
        );

        $this->add_control(
            'features_list_alignment',
            [
                'label' => __( 'Alignment', 'eventas' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'eventas' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'eventas' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'eventas' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_width',
            [
                'label' => __( 'Width', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 25,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__feature-inner' => 'margin-left: calc((100% - {{SIZE}}%)/2); margin-right: calc((100% - {{SIZE}}%)/2)',
                ],
            ]
        );

        $this->add_control(
            'list_divider',
            [
                'label' => __( 'Divider', 'eventas' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'eventas' ),
                'label_off' => __( 'No', 'eventas' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'divider_style',
            [
                'label' => __( 'Style', 'eventas' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'solid' => __( 'Solid', 'eventas' ),
                    'double' => __( 'Double', 'eventas' ),
                    'dotted' => __( 'Dotted', 'eventas' ),
                    'dashed' => __( 'Dashed', 'eventas' ),
                ],
                'default' => 'solid',
                'condition' => [
                    'list_divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list li:before' => 'border-top-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd',
                'condition' => [
                    'list_divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list li:before' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'divider_weight',
            [
                'label' => __( 'Weight', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
                'condition' => [
                    'list_divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list li:before' => 'border-top-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'divider_width',
            [
                'label' => __( 'Width', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'list_divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list li:before' => 'margin-left: calc((100% - {{SIZE}}%)/2); margin-right: calc((100% - {{SIZE}}%)/2)',
                ],
            ]
        );

        $this->add_control(
            'divider_gap',
            [
                'label' => __( 'Gap', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 15,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'condition' => [
                    'list_divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__features-list li:before' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_footer_style',
            [
                'label' => __( 'Footer', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'footer_bg_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__footer' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'footer_padding',
            [
                'label' => __( 'Padding', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_footer_button',
            [
                'label' => __( 'Button', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'button_text!' => '',
                ],
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
                    '{{WRAPPER}} .eventas-price-table__button' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .eventas-price-table__button',
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
                    '{{WRAPPER}} .eventas-price-table__button' => 'background-color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .eventas-price-table__button',
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
                    '{{WRAPPER}} .eventas-price-table__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eventas-price-table__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eventas-price-table__button:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .eventas-price-table__button:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .eventas-price-table__button:hover' => 'border-color: {{VALUE}};',
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

        $this->add_control(
            'heading_additional_info',
            [
                'label' => __( 'Additional Info', 'eventas' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'footer_additional_info!' => '',
                ],
            ]
        );

        $this->add_control(
            'additional_info_color',
            [
                'label' => __( 'Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__additional_info' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'footer_additional_info!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'additional_info_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__additional_info',
                'condition' => [
                    'footer_additional_info!' => '',
                ],
            ]
        );

        $this->add_control(
            'additional_info_margin',
            [
                'label' => __( 'Margin', 'eventas' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => 15,
                    'right' => 30,
                    'bottom' => 0,
                    'left' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__additional_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'condition' => [
                    'footer_additional_info!' => '',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_ribbon_style',
            [
                'label' => __( 'Ribbon', 'eventas' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
                'condition' => [
                    'show_ribbon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'ribbon_bg_color',
            [
                'label' => __( 'Background Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__ribbon-inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $ribbon_distance_transform = is_rtl() ? 'translateY(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)' : 'translateY(-50%) translateX(-50%) translateX({{SIZE}}{{UNIT}}) rotate(-45deg)';

        $this->add_responsive_control(
            'ribbon_distance',
            [
                'label' => __( 'Distance', 'eventas' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__ribbon-inner' => 'margin-top: {{SIZE}}{{UNIT}}; transform: ' . $ribbon_distance_transform,
                ],
            ]
        );

        $this->add_control(
            'ribbon_text_color',
            [
                'label' => __( 'Text Color', 'eventas' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .eventas-price-table__ribbon-inner' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ribbon_typography',
                'selector' => '{{WRAPPER}} .eventas-price-table__ribbon-inner',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .eventas-price-table__ribbon-inner',
            ]
        );

        $this->end_controls_section();
    }

    private function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'pound' => '&#163;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'baht' => '&#3647;',
            'yen' => '&#165;',
            'won' => '&#8361;',
            'guilder' => '&fnof;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
        ];
        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
    }

    protected function render() {
        $settings = $this->get_settings();
        $symbol = '';

        if ( ! empty( $settings['currency_symbol'] ) ) {
            if ( 'custom' !== $settings['currency_symbol'] ) {
                $symbol = $this->get_currency_symbol( $settings['currency_symbol'] );
            } else {
                $symbol = $settings['currency_symbol_custom'];
            }
        }

        $price = explode( '.', $settings['price'] );
        $intpart = $price[0];
        $fraction = '';
        if ( 2 === sizeof( $price ) ) {
            $fraction = $price[1];
        }

        $period_position = $settings['period_position'];
        $period_element = '<span class="eventas-price-table__period eventas-typo-excluded">' . $settings['period'] . '</span>';

        $this->add_render_attribute( 'button', 'class', [
                'eventas-price-table__button',
                'eventas-button',
            ]
        );

        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

            if ( ! empty( $settings['link']['is_external'] ) ) {
                $this->add_render_attribute( 'button', 'target', '_blank' );
            }
        }

        if ( ! empty( $settings['button_hover_animation'] ) ) {
            $this->add_render_attribute( 'button', 'class', 'eventas-animation-' . $settings['button_hover_animation'] );
        }
        ?>
        <div class="eventas-price-table">
            <?php if ( $settings['heading'] || $settings['sub_heading'] ) : ?>
                <div class="eventas-price-table__header">
                    <?php if ( ! empty( $settings['heading'] ) ) : ?>
                        <h3 class="eventas-price-table__heading"><?php echo $settings['heading']; ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $settings['sub_heading'] ) ) : ?>
                        <span class="eventas-price-table__subheading"><?php echo $settings['sub_heading']; ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="eventas-price-table__price">
                <?php if ( 'yes' === $settings['sale'] && ! empty( $settings['original_price'] ) ) : ?>
                    <div class="eventas-price-table__original-price eventas-typo-excluded"><?php echo $symbol . $settings['original_price']; ?></div>
                <?php endif; ?>
                <?php if ( ! empty( $symbol ) && is_numeric( $intpart ) ) : ?>
                    <span class="eventas-price-table__currency"><?php echo $symbol; ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $intpart ) || 0 <= $intpart ) : ?>
                    <span class="eventas-price-table__integer-part"><?php echo $intpart; ?></span>
                <?php endif; ?>

                <?php if ( 0 < $fraction || ( ! empty( $settings['period'] ) && 'beside' === $period_position ) ) : ?>
                    <div class="eventas-price-table__after-price">
                        <span class="eventas-price-table__fractional-part"><?php echo $fraction; ?></span>
                        <?php if ( ! empty( $settings['period'] ) && 'beside' === $period_position ) : ?>
                            <?php echo $period_element; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $settings['period'] ) && 'below' === $period_position ) : ?>
                    <?php echo $period_element; ?>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $settings['features_list'] ) ) : ?>
                <ul class="eventas-price-table__features-list">
                    <?php foreach ( $settings['features_list'] as $item ) : ?>
                        <li class="eventas-repeater-item-<?php echo $item['_id']; ?>">
                            <div class="eventas-price-table__feature-inner">
                                <?php if ( ! empty( $item['item_icon'] ) ) : ?>
                                    <i class="<?php echo esc_attr( $item['item_icon'] ); ?>"></i>
                                <?php endif; ?>
                                <?php if ( ! empty( $item['item_text'] ) ) :
                                    echo $item['item_text'];
                                else :
                                    echo '&nbsp;';
                                endif;
                                ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( ! empty( $settings['button_text'] ) || ! empty( $settings['footer_additional_info'] ) ) : ?>
                <div class="eventas-price-table__footer">
                    <?php if ( ! empty( $settings['button_text'] ) ) : ?>
                        <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                            <?php echo $settings['button_text']; ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $settings['footer_additional_info'] ) ) : ?>
                        <div class="eventas-price-table__additional_info"><?php echo $settings['footer_additional_info']; ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( 'yes' === $settings['show_ribbon'] && ! empty( $settings['ribbon_title'] ) ) :
            $this->add_render_attribute( 'ribbon-wrapper', 'class', 'eventas-price-table__ribbon' );

            if ( ! empty( $settings['ribbon_horizontal_position'] ) ) :
                $this->add_render_attribute( 'ribbon-wrapper', 'class', 'eventas-ribbon-' . $settings['ribbon_horizontal_position'] );
            endif;

            ?>
            <div <?php echo $this->get_render_attribute_string( 'ribbon-wrapper' ); ?>>
                <div class="eventas-price-table__ribbon-inner"><?php echo $settings['ribbon_title']; ?></div>
            </div>
        <?php endif;
    }

    protected function _content_template() {
        ?>
        <#
            var symbols = {
            dollar: '&#36;',
            euro: '&#128;',
            franc: '&#8355;',
            pound: '&#163;',
            ruble: '&#8381;',
            shekel: '&#8362;',
            baht: '&#3647;',
            yen: '&#165;',
            won: '&#8361;',
            guilder: '&fnof;',
            peso: '&#8369;',
            peseta: '&#8359;',
            lira: '&#8356;',
            rupee: '&#8360;',
            real: 'R$',
            krona: 'kr'
            };

            var symbol = '';

            if ( settings.currency_symbol ) {
            if ( 'custom' !== settings.currency_symbol ) {
            symbol = symbols[ settings.currency_symbol ] || '';
            } else {
            symbol = settings.currency_symbol_custom;
            }
            }

            var price = settings.price.split( '.' ),
            intpart = price[0],
            fraction = price[1],

            periodElement = '<span class="eventas-price-table__period eventas-typo-excluded">' + settings.period + '</span>',

        buttonClasses = 'eventas-price-table__button eventas-button';

        if ( settings.button_hover_animation ) {
        buttonClasses += ' eventas-animation-' + settings.button_hover_animation;
        }

        #>
        <div class="eventas-price-table">
            <# if ( settings.heading || settings.sub_heading ) { #>
                <div class="eventas-price-table__header">
                    <# if ( settings.heading ) { #>
                        <h3 class="eventas-price-table__heading">{{{ settings.heading }}}</h3>
                        <# } #>
                            <# if ( settings.sub_heading ) { #>
                                <span class="eventas-price-table__subheading">{{{ settings.sub_heading }}}</span>
                                <# } #>
                </div>
                <# } #>

                    <div class="eventas-price-table__price">
                        <# if ( settings.sale && settings.original_price ) { #>
                            <div class="eventas-price-table__original-price eventas-typo-excluded">{{{ symbol + settings.original_price }}}</div>
                            <# } #>

                                <# if (  ! _.isEmpty( symbol ) && isFinite( intpart ) ) { #>
                                    <span class="eventas-price-table__currency">{{{ symbol }}}</span>
                                    <# } #>
                                        <# if ( intpart ) { #>
                                            <span class="eventas-price-table__integer-part">{{{ intpart }}}</span>
                                            <# } #>
                                                <div class="eventas-price-table__after-price">
                                                    <# if ( fraction ) { #>
                                                        <span class="eventas-price-table__fractional-part">{{{ fraction }}}</span>
                                                        <# } #>
                                                            <# if ( settings.period && 'beside' === settings.period_position ) { #>
                                                                {{{ periodElement }}}
                                                                <# } #>
                                                </div>

                                                <# if ( settings.period && 'below' === settings.period_position ) { #>
                                                    {{{ periodElement }}}
                                                    <# } #>
                    </div>

                    <# if ( settings.features_list ) { #>
                        <ul class="eventas-price-table__features-list">
                            <# _.each( settings.features_list, function( item ) { #>
                                <li class="eventas-repeater-item-{{ item._id }}">
                                    <div class="eventas-price-table__feature-inner">
                                        <# if ( item.item_icon ) { #>
                                            <i class="{{ item.item_icon }}"></i>
                                            <# } #>
                                                <# if ( ! _.isEmpty( item.item_text.trim() ) ) { #>
                                                    {{{ item.item_text }}}
                                                    <# } else { #>
                                                        &nbsp;
                                                        <# } #>

                                    </div>
                                </li>
                                <# } ); #>
                        </ul>
                        <# } #>

                            <# if ( settings.button_text || settings.footer_additional_info ) { #>
                                <div class="eventas-price-table__footer">
                                    <# if ( settings.button_text ) { #>
                                        <a href="#" class="{{ buttonClasses }}">{{{ settings.button_text }}}</a>
                                        <# } #>
                                            <# if ( settings.footer_additional_info ) { #>
                                                <p class="eventas-price-table__additional_info">{{{ settings.footer_additional_info }}}</p>
                                                <# } #>
                                </div>
                                <# } #>
        </div>

        <# if ( 'yes' === settings.show_ribbon && settings.ribbon_title ) {
            var ribbonClasses = 'eventas-price-table__ribbon';
            if ( settings.ribbon_horizontal_position ) {
            ribbonClasses += ' eventas-ribbon-' + settings.ribbon_horizontal_position;
            } #>
            <div class="{{ ribbonClasses }}">
                <div class="eventas-price-table__ribbon-inner">{{{ settings.ribbon_title }}}</div>
            </div>
            <# } #>
        <?php
    }
}
