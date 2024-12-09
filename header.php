<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<?php
	foreach (get_field('head_open_scripts', 'option') as $head_open_script) {
		if ($head_open_script['enabled']) {
			echo $head_open_script['script'];
		}
	}
	?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	wp_head();

	foreach (get_field('head_close_scripts', 'option') as $head_close_script) {
		if ($head_close_script['enabled']) {
			echo $head_close_script['script'];
		}
	}
	?>
</head>

<body <?php body_class(print_debug_screens_if_in_development_mode()); ?>>
	<?php
	wp_body_open();

	foreach (get_field('body_open_scripts', 'option') as $body_open_script) {
		if ($body_open_script['enabled']) {
			echo $body_open_script['script'];
		}
	}

	foreach (get_field('header_top_banners', 'option') as $header_top_banner_index => $header_top_banner) {
		if ($header_top_banner['enabled'] && check_render_condition_for_flexible_content($header_top_banner['acf_fc_layout'] . '_' . ++$header_top_banner_index, $header_top_banner['include_pages'], $header_top_banner['include_categories'], $header_top_banner['include_product_categories'], $header_top_banner['include_subject_categories'], $header_top_banner['exclude_pages'], $header_top_banner['exclude_categories'], $header_top_banner['exclude_product_categories'], $header_top_banner['exclude_subject_categories'])) {
			get_template_part('templates/' . str_replace('_', '-', $header_top_banner['acf_fc_layout']), null, $header_top_banner);
		}
	}

	if (get_field('header_3_enabled', 'option') && check_render_condition('header_3')) {
		get_template_part('templates/header', '3');
	} else if (get_field('header_2_enabled', 'option') && check_render_condition('header_2')) {
		get_template_part('templates/header', '2');
	} else {
		get_template_part('templates/header', 'default');
	}

	foreach (get_field('header_bottom_banners', 'option') as $header_bottom_banner_index => $header_bottom_banner) {
		if ($header_bottom_banner['enabled'] && check_render_condition_for_flexible_content($header_bottom_banner['acf_fc_layout'] . '_' . ++$header_bottom_banner_index, $header_bottom_banner['include_pages'], $header_bottom_banner['include_categories'], $header_bottom_banner['include_product_categories'], $header_bottom_banner['include_subject_categories'], $header_bottom_banner['exclude_pages'], $header_bottom_banner['exclude_categories'], $header_bottom_banner['exclude_product_categories'], $header_bottom_banner['exclude_subject_categories'])) {
			get_template_part('templates/' . str_replace('_', '-', $header_bottom_banner['acf_fc_layout']), null, $header_bottom_banner);
		}
	}

	$popups = get_field('popups', 'option');
	?>

	<script>
		window.popups = !!<?php echo json_encode($popups); ?>.length;
	</script>

	<?php
	foreach ($popups as $popup_index => $popup) {
		if ($popup['enabled'] && check_render_condition_for_flexible_content($popup['acf_fc_layout'] . '_' . ++$popup_index, $popup['include_pages'], $popup['include_categories'], $popup['include_product_categories'], $popup['include_subject_categories'], $popup['exclude_pages'], $popup['exclude_categories'], $popup['exclude_product_categories'], $popup['exclude_subject_categories'])) {
			get_template_part('templates/' . str_replace('_', '-', $popup['acf_fc_layout']), null, $popup);
		}
	}
