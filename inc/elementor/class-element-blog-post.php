<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Eventas Blog Post
 *
 * Elementor widget for displaying recent posts.
 *
 * @since 1.0.0
 */
class Widget_Blog_Post extends Widget_Base {

    public function get_name() {
        return 'eventas-blog-post';
    }

    public function get_title() {
        return __('Blog Post', 'eventas');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['digicraft'];
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
                'label' => __('Query', 'eventas'),
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'eventas'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => __('Date', 'eventas'),
                    'title' => __('Title', 'eventas'),
                    'rand' => __('Random', 'eventas'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'eventas'),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC' => __('ASC', 'eventas'),
                    'DESC' => __('DESC', 'eventas'),
                ],
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Item to Show', 'eventas'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => -1,
                'max' => 50,
                'step' => 1,
            ]
        );

        $this->add_control(
            'show_sticky',
            [
                'label' => __( 'Show Sticky', 'eventas' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __( 'Yes', 'eventas' ),
                'label_off' => __( 'No', 'eventas' ),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();

        if('yes' == $settings['show_sticky']) {
            $args = array(
                'post_type' => 'post',
                'order' => $settings['order'],
                'orderby' => $settings['orderby'],
                'posts_per_page' => $settings['posts_per_page']
            );
        } else {
            $args = array(
                'post_type' => 'post',
                'order' => $settings['order'],
                'orderby' => $settings['orderby'],
                'posts_per_page' => $settings['posts_per_page'],
                'post__not_in' => get_option( 'sticky_posts' )
            );
        }

        $q = new WP_Query($args); ?>

        <div class="blog-style-grid">
            <?php if ($q->have_posts()): ?>

                <?php while ($q->have_posts()): $q->the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-style-grid'); ?>>

                        <?php if (has_post_thumbnail()): ?>
                            <figure class="entry-image">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"
                                                                         alt="<?php the_title(); ?>"></a>
                            </figure>
                        <?php endif; ?>
                        <div class="entry-wrapper">
                            <header class="entry-header">

                                <?php if(is_sticky()): ?>
                                    <div class="sticky-post-indicator">
                                        <div class="sticky-text">
                                            <?php esc_html_e('Sticky!', 'eventas'); ?>
                                        </div>
                                        <div class="corner-triangle"></div>
                                        <i class="fa fa-star"></i>
                                    </div>
                                <?php endif; ?>

                                <div class="entry-meta">
                                    <?php eventas_date_meta(); ?>
                                    <?php esc_html_e('|', 'eventas'); ?>
                                    <?php eventas_author_meta(); ?>
                                </div><!-- .entry-meta -->

                                <div class="entry-title">
                                    <?php the_title('<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                </div>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php
                                the_excerpt();

                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'eventas'),
                                    'after' => '</div>',
                                ));
                                ?>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="ev-read-more"><?php esc_html_e('View Story', 'eventas'); ?></a>
                            </footer><!-- .entry-footer -->
                        </div>
                    </article><!-- #post-## -->

                <?php endwhile;
                wp_reset_postdata(); ?>


            <?php else: ?>

                <p> <?php esc_html_e('Sorry no post found.', 'eventas'); ?> </p>

            <?php endif; ?>
        </div>

    <?php }

    protected function _content_template() {

    }
}
