<?php

if (!defined('ABSPATH')) {
	exit;
}

include 'vendor/autoload.php';

require get_template_directory() . '/includes/admin-functions.php';
require get_template_directory() . '/includes/cli-functions.php';
require get_template_directory() . '/includes/header-functions.php';
require get_template_directory() . '/includes/helper-functions.php';
require_once get_template_directory() . '/includes/Redis.php';
require get_template_directory() . '/includes/shortcode-functions.php';
require get_template_directory() . '/includes/theme-functions.php';
