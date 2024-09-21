<?php

namespace AanirEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit;


class Testimonial extends Widget_Base
{


    public $base;

    public function get_name()
    {
        return 'aanir-testimonial';
    }

    public function get_title()
    {
        return esc_html__('Aanir Testimonial', 'aanir-essential');
    }

    public function get_keywords()
    {
        return ['aanir', 'testimonial'];
    }

    public function get_icon()
    {
        return 'eicon-testimonial';
    }

    public function get_categories()
    {
        return ['aanir-elements'];
    }

    public function get_script_depends()
    {
        return [
            'slick'
        ];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Settings', 'aanir-essential'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'aanir-essential'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'aanir-essential'),
                    'style2' => esc_html__('Style 2', 'aanir-essential'),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label'       => esc_html__('Name', 'aanir-essential'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Title here', 'aanir-essential'),
                'default'     => esc_html__('ThGet Amazing Support With', 'aanir-essential'),

            ]
        );

        $repeater->add_control(
            'date',
            [
                'label'       => esc_html__('Sub title', 'aanir-essential'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Date here', 'aanir-essential'),
                'default'     => esc_html__('April 14, 2022', 'aanir-essential'),

            ]
        );

        $repeater->add_control(
            'content',
            [
                'label'       => esc_html__('Content', 'aanir-essential'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label'   => esc_html__('Image', 'aanir-essential'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'rating',
            [
                'label'       => esc_html__('Rating', 'aanir-essential'),
                'type'        => Controls_Manager::NUMBER,
                'label_block' => true,
                'placeholder' => esc_html__('Rating here', 'aanir-essential'),
                'default'     => 3,

            ]
        );

        $repeater->add_control(
            'rating_review',
            [
                'label'       => esc_html__('Review Count (style2)', 'aanir-essential'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('4.7 (review)', 'aanir-essential'),
                'default'     => '4.7(review)',

            ]
        );


        $this->add_control(
            'list',
            [
                'label'       => esc_html__('List', 'aanir-essential'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'show_navigation',
            [

                'label'       => esc_html__('Dot Navigation', 'aanir-essential'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'aanir-essential'),
                'label_off'   => esc_html__('No', 'aanir-essential'),
                'default'     => 'yes',

            ]
        );

        $this->add_control(
            'show_arrow',
            [

                'label'       => esc_html__('Arrow Navigation', 'aanir-essential'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'aanir-essential'),
                'label_off'   => esc_html__('No', 'aanir-essential'),
                'default'     => 'no',

            ]
        );

        $this->add_control(
            'auto_play',
            [

                'label'       => esc_html__('Auto play', 'aanir-essential'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'aanir-essential'),
                'label_off'   => esc_html__('No', 'aanir-essential'),
                'default'     => 'yes',

            ]
        );

        $this->add_control(
            'auto_loop',
            [
                'label'       => esc_html__('Slider loop', 'aanir-essential'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__('Yes', 'aanir-essential'),
                'label_off'   => esc_html__('No', 'aanir-essential'),
                'default'     => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .content .author-info .title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info .title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typho',
                'label'    => esc_html__('Typography', 'aanir-essential'),

                'selector' => '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info .title,{{WRAPPER}} .aanir-testimonial-slider-2-item .content .author-info .title',
            ]
        );
        $this->add_responsive_control(
            'title-padding',
            [
                'label'      => esc_html__('Padding', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .content .author-info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label'     => esc_html__('Color', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .text p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_typho',
                'label'    => esc_html__('Typography', 'aanir-essential'),
                'selector' => '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .text p,{{WRAPPER}} .aanir-testimonial-slider-2-item .content p',
            ]
        );

        $this->add_responsive_control(
            'content-padding',
            [
                'label'      => esc_html__('Padding', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_date',
            [
                'label' => esc_html__('Sub title', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label'     => esc_html__('Color', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .content .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'date_typho',
                'label'    => esc_html__('Typography', 'aanir-essential'),
                'selector' => '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info span,{{WRAPPER}} .aanir-testimonial-slider-2-item .content .author-info span',
            ]
        );

        $this->add_responsive_control(
            'date-padding',
            [
                'label'      => esc_html__('Padding', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .content .author-info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_review',
            [
                'label' => esc_html__('Review', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'review_color',
            [
                'label'     => esc_html__('Color', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .thumb span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'dreview_typho',
                'label'    => esc_html__('Typography', 'aanir-essential'),
                'selector' => '{{WRAPPER}} .aanir-testimonial-slider-2-item .thumb span',
            ]
        );

        $this->add_responsive_control(
            'review-padding',
            [
                'label'      => esc_html__('Padding', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .thumb span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Image', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__('Height', 'aanir-essential'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 5,
                        'max'  => 200,
                        'step' => 1,
                    ],

                ],

                'selectors' => [
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .thumb img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__('Width', 'aanir-essential'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 5,
                        'max'  => 200,
                        'step' => 1,
                    ],

                ],

                'selectors' => [
                    '{{WRAPPER}} .aanir-testimonial-slider .aanir-testimonial-item .author-info img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2-item .thumb img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_main',
            [
                'label' => esc_html__('Section', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sections-padding',
            [
                'label'      => esc_html__('Padding', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .section-testimonials' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sections-margin',
            [
                'label'      => esc_html__('Margin', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .section-testimonials' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'sections_background',
                'label' => esc_html__('Background', 'aanir-essential'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .section-testimonials',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_nav_box_style',
            [
                'label' => esc_html__('Slider nav', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slider_nav__color',
            [

                'label'     => esc_html__('Color', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-arrow i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2 .slick-arrow i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'slider_nav_bg_color',
            [

                'label'     => esc_html__('BGColor', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-arrow i' => 'Background: {{VALUE}};',
                    '{{WRAPPER}}.aanir-testimonial-slider-2 .slick-arrow i' => 'Background: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'slider_nav_bg_hv_color',
            [

                'label'     => esc_html__('Hover BGColor', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-arrow:hover i' => 'Background: {{VALUE}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2 .slick-arrow:hover i' => 'Background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'slider_dnav_margin',
            [
                'label'      => esc_html__('Margin', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aanir-testimonial-slider-2 .slick-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_nav_boxd-t_style',
            [
                'label' => esc_html__('Slider Dot nav', 'aanir-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'slider_nav_dbg_color',
            [

                'label'     => esc_html__('BGColor', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button, {{WRAPPER}} .aanir-testimonial-slider .slick-dots li button' => 'Background: {{VALUE}};',

                ],
            ]
        );


        $this->add_responsive_control(
            'slider_dddnav_margin',
            [
                'label'      => esc_html__('Margin', 'aanir-essential'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings();
        $list     = $settings['list'];
        $controls = [

            'dot'       => $settings['show_navigation'],
            'arrow'       => $settings['show_arrow'],
            'auto_play' => $settings['auto_play'],
            'auto_loop' => $settings['auto_loop'],

        ];
        $controls = json_encode($controls);


?>
        <?php if ($settings['style'] == 'style1') :  ?>

            <div class="aanir-testimonial-area section-testimonials">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="aanir-testimonial-slider" data-controls='<?php echo $controls; ?>'>
                                <?php foreach ($list as $item) : ?>
                                    <div class="aanir-testimonial-item text-center">
                                        <div class="author-info">
                                            <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                            <h5 class="title"><?php echo esc_attr($item['title']); ?></h5>
                                            <?php if ($item['date'] != '') : ?>
                                                <span> <?php echo esc_html($item['date']); ?> </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text">
                                            <?php if ($item['content'] != '') : ?>
                                                <p><?php echo $item['content']; ?></p>
                                            <?php endif; ?>

                                            <?php
                                            $rating = $item['rating'];
                                            ?>
                                            <?php if (is_numeric($rating) && $rating > 0) : ?>
                                                <ul>
                                                    <?php foreach (range(1, $rating) as $rat) : ?>
                                                        <li><i class="fas fa-star"></i></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($settings['style'] == 'style2') : ?>

            <div class="aanir-testimonial-2-area section-testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="aanir-testimonial-2-box">
                                <div class="aanir-testimonial-slider-2" data-controls='<?php echo $controls; ?>'>
                                    <?php foreach ($list as $item) : ?>
                                        <div class="aanir-testimonial-slider-2-item">
                                            <div class="item">
                                                <div class="thumb">
                                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                                    <?php
                                                    $rating = $item['rating'];
                                                    ?>
                                                    <?php if (is_numeric($rating) && $rating > 0) : ?>
                                                        <ul>
                                                            <?php foreach (range(1, $rating) as $rat) : ?>
                                                                <li><i class="fas fa-star"></i></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <?php if ($item['rating_review'] != '') : ?>
                                                        <span> <?php echo $item['rating_review']; ?> </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="content">
                                                    <?php if ($item['content'] != '') : ?>
                                                        <p><?php echo $item['content']; ?></p>
                                                    <?php endif; ?>
                                                    <div class="author-info">
                                                        <h5 class="title"><?php echo esc_attr($item['title']); ?></h5>
                                                        <?php if ($item['date'] != '') : ?>
                                                            <span> <?php echo esc_html($item['date']); ?> </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

<?php
    }
}
