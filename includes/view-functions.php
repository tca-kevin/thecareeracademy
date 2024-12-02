<?php

/**
 * Set up theme
 *
 * @return void
 */
function set_up_theme()
{
	// add_theme_support('woocommerce'); // Storefront Child experiment

	load_theme_textdomain('thecareeracademy', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	register_nav_menus(array('header' => __('Header', 'thecareeracademy')));
	register_nav_menus(array('footer' => __('Footer', 'thecareeracademy')));
	register_nav_menus(array('side' => __('Side', 'thecareeracademy')));
}

add_action('after_setup_theme', 'set_up_theme');

/**
 * Preload custom fonts in head tag
 *
 * @return void
 */
function preload_custom_fonts_in_head_tag()
{
	$fonts = [
		'/wp-content/themes/thecareeracademy/dist/assets/fonts/DrukWide-Medium.woff2',
		'/wp-content/themes/thecareeracademy/dist/assets/fonts/DrukWide-Bold.woff2',
		'/wp-content/themes/thecareeracademy/dist/assets/fonts/DrukWide-Heavy.woff2',
		'/wp-content/themes/thecareeracademy/dist/assets/fonts/DrukWide-MediumItalic.woff2',
		'/wp-content/themes/thecareeracademy/dist/assets/fonts/DrukWide-BoldItalic.woff2',
		'/wp-content/themes/thecareeracademy/dist/assets/fonts/DrukWide-HeavyItalic.woff2',
	];

	foreach ($fonts as $font) {
		echo '<link rel="preload" as="font" href="' . esc_url($font) . '" type="font/woff2" crossorigin="anonymous">' . "\n";
	}
}

add_action('wp_head', 'preload_custom_fonts_in_head_tag', 1);

/**
 * Manage scripts and styles at the start
 *
 * @return void
 */
function manage_scripts_and_styles_at_the_start()
{
	// wp_enqueue_style('storefront-style', get_template_directory_uri() . '/style.css'); // Storefront Child experiment

	wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/phd3vdh.css', array(), null, 'print');

	if (defined('VITE_DEV') && VITE_DEV) {
		echo '<script type="module" src="https://catest.test:5173/@vite/client"></script>';
		wp_enqueue_script('src-js-app', "https://catest.test:5173/src/js/app.js", array(), null);
		wp_enqueue_style('src-sass-style', "https://catest.test:5173/src/sass/style.scss", array(), null);
	} else {
		wp_enqueue_script('dist-assets-js-app', get_stylesheet_directory_uri() . '/dist/assets/js/app.js', array(), wp_get_theme()->get('Version'));
		wp_enqueue_style('style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
	}

	if (is_front_page()) {
		wp_deregister_script('jquery'); // /wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js | /wp-includes/js/jquery/jquery.min.js | /wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js | /wp-includes/js/jquery/jquery-migrate.min.js
		wp_dequeue_style('wp-block-library'); // /wp-includes/css/dist/block-library/style.min.css
		wp_deregister_style('wc-blocks-style'); // /wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks.css
		wp_dequeue_style('woocommerce-layout'); // /wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css
		wp_dequeue_style('woocommerce-smallscreen'); // /wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css
		wp_dequeue_style('woocommerce-general'); // /wp-content/plugins/woocommerce/assets/css/woocommerce.css
		wp_dequeue_style('woocommerce-inline'); // id='woocommerce-inline-inline-css'

		// wp_dequeue_style('wp-block-library-theme'); // id='wp-block-library-theme-inline-css', Storefront Child experiment
		// wp_dequeue_style('storefront-gutenberg-blocks'); // id='storefront-gutenberg-blocks-inline-css', Storefront Child experiment
		// add_filter('storefront_customizer_css', '__return_false'); // id='storefront-style-inline-css', Storefront Child experiment
		// add_filter('storefront_customizer_woocommerce_css', '__return_false'); // id='storefront-woocommerce-style-inline-css', Storefront Child experiment
	}
}

add_action('wp_enqueue_scripts', 'manage_scripts_and_styles_at_the_start');

/**
 * Manage scripts and styles at the end
 *
 * @return void
 */
function manage_scripts_and_styles_at_the_end()
{
	if (is_front_page()) {
		wp_deregister_script('sourcebuster-js'); // /wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.min.js | /wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min.js
	}
}

add_action('wp_enqueue_scripts', 'manage_scripts_and_styles_at_the_end', 9999);

/**
 * Manage scripts and styles before loading any template
 *
 * @return void
 */
function manage_scripts_and_styles_before_loading_any_template()
{
	if (is_front_page()) {
		remove_action('wp_head', 'wp_print_auto_sizes_contain_css_fix', 1); // img:is([sizes="auto" i], [sizes^="auto," i])
		remove_action('wp_head', 'print_emoji_detection_script', 7); // <![CDATA[]]> | /wp-includes/js/wp-emoji-release.min.js?
		remove_action('wp_print_styles', 'print_emoji_styles'); // id='wp-emoji-styles-inline-css'
		remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles'); // id='classic-theme-styles-inline-css'
		remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles'); // id='global-styles-inline-css'
		remove_action('wp_head', 'wc_gallery_noscript'); // .woocommerce-product-gallery
		remove_action('wp_head', 'wp_print_font_faces', 50); // class='wp-fonts-local'
	}
}

add_action('template_redirect', 'manage_scripts_and_styles_before_loading_any_template');

/**
 * Manage scripts and styles in body tag
 *
 * @param [type] $classes
 * @return void
 */
function manage_scripts_and_styles_in_body_tag($classes)
{
	if (is_front_page()) {
		remove_action('wp_footer', 'wc_no_js'); // type="application/ld+json"
	}

	return $classes;
}

add_filter('body_class', 'manage_scripts_and_styles_in_body_tag');

/**
 * Modify script tags
 *
 * @param [type] $tag
 * @param [type] $handle
 * @param [type] $src
 * @return void
 */
function modify_script_tags($tag, $handle, $src)
{
	if ($handle === 'src-js-app') {
		$tag = '<script type="module" src="' . $src . '"></script>';
	}

	if ($handle === 'dist-assets-js-app') {
		$tag = '<script type="module" src="' . $src . '" defer></script>';
		// $tag = '<link rel="preload" href="' . $src . '" as="script" />';
	}

	return $tag;
}

add_filter('script_loader_tag', 'modify_script_tags', 10, 3);

/**
 * Modify style tags
 *
 * @param [type] $html
 * @param [type] $handle
 * @return void
 */
function modify_style_tags($html, $handle)
{
	if ($handle === 'adobe-fonts') {
		$html = str_replace("media='print'", "media='all'", $html);
	}

	if ($handle === 'style') {
		$html = str_replace("<link rel='stylesheet'", "<link rel='preload' as='style' onload=\"this.onload=null; this.rel='stylesheet'\"", $html);
	}

	return $html;
}

add_filter('style_loader_tag', 'modify_style_tags', 10, 2);
