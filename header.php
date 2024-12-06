<!doctype html>
<html <?php language_attributes(); ?> class="h-full">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(debug_screens() . ' h-full'); ?>>
	<?php
	wp_body_open();
	get_template_part('tmpl/header', get_header_template());
	?>