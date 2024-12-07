<!doctype html>
<html <?php language_attributes(); ?> class="h-full">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(print_debug_screens_if_in_development_mode() . ' h-full'); ?>>
	<?php
	wp_body_open();

	if (get_field('header_3_enabled', 'option') && check_if_header_is_allowed(3)) {
		get_template_part('templates/header', '3');
	} else if (get_field('header_2_enabled', 'option') && check_if_header_is_allowed(2)) {
		get_template_part('templates/header', '2');
	} else {
		get_template_part('templates/header', 'default');
	}
	?>