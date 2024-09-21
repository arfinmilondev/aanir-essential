<?php

/**
 * @package  aanir-essential
 */

namespace AanirEssential\Base;

class Deactivate
{
	public static function deactivate()
	{
		flush_rewrite_rules();
	}
}
