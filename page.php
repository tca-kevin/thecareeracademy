<?php get_header(); ?>
<?php the_post(); ?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (get_the_content()) { ?>
		<div class="container mx-auto px-4">
			<article class="font-sans my-8 lg:my-12"><?php the_content(); ?></article>
		</div>
	<?php }
	$widgets_that_require_alpine = [];
	$loaded_js_files = [];
	$loaded_css_files = [];

	foreach (get_field('widgets', get_the_ID()) as $layout_index => $layout) {
		$layout_key = str_replace('_', '-', $layout['acf_fc_layout']);

		get_template_part('templates/' . $layout_key, null, $layout);

		if (in_array($layout_key, $widgets_that_require_alpine) && !in_array('alpine', $loaded_js_files)) {
			echo is_dev() ? '<script type="module" src="' . get_site_url() . ':' . VITE_PORT . '/src/js/alpine.js"></script>' : '<script type="module" src="' . get_site_url() . '/wp-content/themes/thecareeracademy/dist/assets/js/alpine.js?ver=' . wp_get_theme()->get('Version') . '"></script>';
			$loaded_js_files[] = 'alpine';
		}

		if (file_exists(get_template_directory() . '/src/js/' . $layout_key . '.js') && !in_array($layout_key, $loaded_js_files)) {
			echo is_dev() ? '<script type="module" src="' . get_site_url() . ':' . VITE_PORT . '/src/js/' . $layout_key . '.js"></script>' : '<script type="module" src="' . get_site_url() . '/wp-content/themes/thecareeracademy/dist/assets/js/' . $layout_key . '.js?ver=' . wp_get_theme()->get('Version') . '"></script>';
			$loaded_js_files[] = $layout_key;
		}

		if (file_exists(get_template_directory() . '/src/sass/' . $layout_key . '.scss') && !in_array($layout_key, $loaded_css_files)) {
			echo is_dev() ? '<link rel="stylesheet" id="src-sass-' . $layout_key . '-css" href="' . get_site_url() . ':' . VITE_PORT . '/src/sass/' . $layout_key . '.scss" type="text/css" media="all" />' : '<link rel="stylesheet" id="' . $layout_key . '-css" href="' . get_site_url() . '/wp-content/themes/thecareeracademy/dist/assets/css/' . $layout_key . '.css?ver=' . wp_get_theme()->get('Version') . '"  type="text/css" media="all" />';
			$loaded_css_files[] = $layout_key;
		}
	}
	?>
</main>
<?php get_footer(); ?>