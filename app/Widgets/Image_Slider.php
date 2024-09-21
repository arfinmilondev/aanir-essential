<?php

namespace AanirEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit;


class Image_Slider extends Widget_Base
{


    public $base;

    public function get_name()
    {
        return 'aanir-image-carousel';
    }

    public function get_title()
    {
        return esc_html__('Aanir Image Carousel', 'aanir-essential');
    }

    public function get_keywords()
    {
        return ['aanir', 'image-carousel'];
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
            'image',
            [
                'label'   => esc_html__('Image', 'aanir-essential'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
                    '{{WRAPPER}} .aanir-video-player-slider img' => 'height: {{SIZE}}{{UNIT}};',

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

                    '{{WRAPPER}} .aanir-video-player-slider img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .aanir-video-player-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .aanir-video-player-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

                ],
            ]
        );

        $this->add_control(
            'slider_nav_bg_color',
            [

                'label'     => esc_html__('BGColor', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aanir-video-player-slider .slick-arrow' => 'Background: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'slider_nav_bg_hv_color',
            [

                'label'     => esc_html__('Hover BGColor', 'aanir-essential'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aanir-video-player-slider .slick-arrow:hover' => 'Background: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'aanir-essential'),
                'selector' => '{{WRAPPER}} .slick-arrow',
            ]
        );


        $this->add_control(
            'slider_arrow_nav_prev',
            [
                'label' => esc_html__('Previous Right Position', 'aanir-essential'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],


                'selectors' => [
                    '{{WRAPPER}} .aanir-video-player-slider .slick-arrow.prev' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'slider_arrow_nav_next',
            [
                'label' => esc_html__('Previous Right Position', 'aanir-essential'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],


                'selectors' => [
                    '{{WRAPPER}} .aanir-video-player-slider .slick-arrow.next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings();
        $list     = $settings['list'];



?>
        <div class="aanir-video-player-slider">
            <?php foreach ($list as $item) : ?>
                <div class="item">
                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                </div>
            <?php endforeach; ?>

        </div>
<?php
    }
}
