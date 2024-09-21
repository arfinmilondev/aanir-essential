<?php

/**
 * @package  quomodo
 */

namespace AanirEssential\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public function __construct()
	{
		$this->plugin_path = AANIR_ESSENTIAL_PLUGIN_PATH;
		$this->plugin_url  = AANIR_ESSENTIAL_PLUGIN_URL;
		$this->plugin      = AANIR_ESSENTIAL_PLUGIN;
	}
}
