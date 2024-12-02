<?php

/**
 * Enable SVG support
 *
 * @param [type] $mimes
 * @return void
 */
function enable_svg_support($mimes)
{
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter('upload_mimes', 'enable_svg_support');
