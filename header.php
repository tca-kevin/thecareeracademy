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

	if (is_dev()) {
	?>
		<script type="module" src="https://catest.test:5173/src/js/header.js"></script>
	<?php
	} else {
	?>
		<script type="module" src="https://catest.test/wp-content/themes/thecareeracademy/dist/assets/js/header.js?ver=<?php echo wp_get_theme()->get('Version'); ?>"></script>
	<?php
	}

	wp_body_open();

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

	if (is_dev()) {
	?>
		<script type="module" src="https://catest.test:5173/src/js/popup.js"></script>
	<?php
	} else {
	?>
		<script type="module" src="https://catest.test/wp-content/themes/thecareeracademy/dist/assets/js/popup.js?ver=<?php echo wp_get_theme()->get('Version'); ?>"></script>
	<?php
	}
	?>




	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
	<script>
		hbspt.forms.create({
			region: 'na1',
			portalId: '20367523',
			formId: 'b7bdf4c9-74c9-4163-90a4-8547a1be2e81',
			submitButtonClass: 'hubspot-form-submit-button',
			target: '.hubspot-form',
			onFormReady: (form) => {
				const submitButton = form.querySelector('.hubspot-form-submit-button');
				submitButton.style.fontFamily = '"Neue Haas Grotesk Display Pro", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"';
				submitButton.style.fontWeight = "500";
				submitButton.style.color = "#FFFFFF";
				submitButton.style.fontSize = "16px";
				submitButton.style.padding = "8px 16px";
				submitButton.style.border = "2px solid #FF6238";
				submitButton.style.borderRadius = "6px";
				submitButton.style.borderColor = "#FF6238";
				submitButton.style.backgroundColor = "#FF6238";
				submitButton.style.cursor = "pointer";
			}
		});
	</script>
	<div class="hubspot-form"></div>