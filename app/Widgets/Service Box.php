<?php

namespace AanirEssential\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit;


class Service_Boxx extends Widget_Base
{

    public $base;

    public function get_name()
    {
        return 'aanir-ie-test-service-box';
    }

    public function get_title()
    {
        return esc_html__('Service Box', 'aanir-essential');
    }

    public function get_icon()
    {
        return 'eicon-dual-button';
    }

    public function get_categories()
    {
        return ['aanir-elements'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_button_tab',
            [
                'label' => esc_html__('Service Box settings', 'aanir-essential'),
            ]
        );

        $this->add_control(
            'service_icon',
            [
                'label'       => esc_html__('Service Icon', 'aanir-essential'),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__('Button Text', 'aanir-essential'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Read More',
                'placeholder' => esc_html__('Button text here', 'aanir-essential'),
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label'       => esc_html__('Button Url', 'aanir-essential'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    } //Register control end

    protected function render()
    {

        $settings    = $this->get_settings();


?>
        <a class="test-btn" href="<?php $settings['button_url'] ?>"><?php echo $settings['button_text'] ?></a>

<?php

    }

    protected function content_template() {}
}
