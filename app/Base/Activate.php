<?php

/**
 * @package  aanir-essential
 */

namespace AanirEssential\Base;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();
	}
}
