<?php get_header(); ?>
<?php the_post(); ?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container mx-auto px-4">
		<h1 class="font-druk-wide font-normal text-2xl lg:text-4xl my-8 lg:my-12"><?php the_title(); ?></h1>
		<article class="font-sans my-8 lg:my-12"><?php the_content(); ?></article>
	</div>
	<?php
	$loaded_js_files = [];

	foreach (get_field('widgets', get_the_ID()) as $layout_index => $layout) {
		$layout_key = str_replace('_', '-', $layout['acf_fc_layout']);

		get_template_part('templates/' . $layout_key, null, $layout);

		if (file_exists(get_template_directory() . '/src/js/' . $layout_key . '.js') && !in_array($layout['acf_fc_layout'], $loaded_js_files)) {
			if (is_dev()) {
				echo '<script type="module" src="' . get_site_url() . ':5173/src/js/' . $layout_key . '.js"></script>';
			} else {
				echo '<script type="module" src="/wp-content/themes/thecareeracademy/dist/assets/js/' . $layout_key . '.js?ver=' . wp_get_theme()->get('Version') . '"></script>';
			}
			$loaded_js_files[] = $layout_key;
		}
	}
	?>
</main>
<?php get_footer(); ?>