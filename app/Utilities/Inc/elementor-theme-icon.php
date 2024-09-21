<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('aanir_theme_icons_sets')) {

	function aanir_theme_icons_sets()
	{
		$icons = array(
			'social-marketing',
			'marketing',
			'growth',
			'consulting',
			'Targeting',
			'Integration',
			'Reporting',
			'Revenue',

		);
		return $icons;
	}
}
if (!class_exists('AANIR_Theme_Icon_Icons')) {


	class AANIR_Theme_Icon_Icons
	{

		public function __construct()
		{
			add_filter('elementor/icons_manager/additional_tabs', [$this, 'element_ready_elementor_streaming_setup']);
		}



		public function element_ready_elementor_streaming_setup($tabs = array())
		{

			$new_icons = aanir_theme_icons_sets();

			$tabs['aanir'] = array(
				'name'          => 'aanir',
				'label'         => esc_html__('Aanir Theme', 'element-ready-lite'),
				'labelIcon'     => 'icon-target',
				'prefix'        => 'icon-',
				'displayPrefix' => 'aanir',
				'url'           => AANIR_ESSENTIAL_PLUGIN_URL . 'app/Utilities/Inc/assets/aanir-icon.css',
				'icons'         => $new_icons,
				'ver'           => '1.0.0',
			);
			return $tabs;
		}
	}
	new AANIR_Theme_Icon_Icons();
}
