<?php

/**
 * Die dumping
 *
 * @param [type] $value
 * @return void
 */
function dd($value)
{
	d($value);

	die();
}

/**
 * Enable tailwindcss debug screens if in development mode
 * @return void
 */
function debug_screens()
{
	return file_exists(__DIR__ . '/../dev.flag') ? 'debug-screens' : '';
}
