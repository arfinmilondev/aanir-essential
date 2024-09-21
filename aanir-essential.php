<?php

/*
* Plugin Name: Aanir Essentials
* License - GNU/GPL V2 or Later
* Description: This is a essential plugin for Aanir theme.
* Version: 1.1.0
* text domain: aanir-essential
*/

// If this file is calledd directly, abort!!!
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

$my_theme = wp_get_theme();

if (!in_array($my_theme->get('TextDomain'), ['aanir', 'aanir-child'])) {
	return;
}

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Require option library
if (file_exists(dirname(__FILE__) . '/app/Framework/codestar-framework.php')) {
	require_once dirname(__FILE__) . '/app/Framework/codestar-framework.php';
}

/** 
 * plugin constant
 */

define('AANIR_ESSENTIAL_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('AANIR_ESSENTIAL_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AANIR_ESSENTIAL_PLUGIN', plugin_basename(dirname(__FILE__)) . '/aanir-essential.php');
define('AANIR_ESSENTIAL_IMG', get_template_directory_uri() . '/assets/images');

/**
 * The code that runs during plugin activation
 */

function aanir_activate_essential_plugin()
{
	AanirEssential\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'aanir_activate_essential_plugin');

/**
 * The code that runs during plugin deactivation
 */

function aanir_deactivate_essential_plugin()
{
	AanirEssential\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'aanir_deactivate_essential_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('AanirEssential\\Init')) {

	AanirEssential\Init::register_services();
	AanirEssential\Init::register_modules();
}
