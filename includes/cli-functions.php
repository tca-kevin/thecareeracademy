<?php

/**
 * Upsert categories
 *
 * @param [type] $categories
 * @param [type] $taxonomy
 * @return void
 */
function upsert_categories($categories, $taxonomy)
{
	foreach ($categories as $category_term => $category_name) {
		$term = term_exists($category_term, $taxonomy);

		if (!$term) {
			wp_insert_term($category_name, $taxonomy, ['slug' => $category_term]);
		} else {
			wp_update_term($term['term_id'], $taxonomy, ['name' => $category_name]);
		}
	}
}

/**
 * Upsert post categories
 *
 * @return void
 */
function upsert_post_categories()
{
	foreach (POST_CATEGORIES as $category_term => $category_name) {
		$term = term_exists($category_term, 'category');

		if (!$term) {
			wp_insert_term($category_name, 'category', ['slug' => $category_term]);
		} else {
			wp_update_term($term['term_id'], 'category', ['name' => $category_name]);
		}
	}
}

/**
 * Upsert subject categories
 *
 * @return void
 */
function upsert_subject_categories()
{
	foreach (SUBJECT_CATEGORIES as $category_term => $category_name) {
		$term = term_exists($category_term, 'subject');

		if (!$term) {
			wp_insert_term($category_name, 'subject', ['slug' => $category_term]);
		} else {
			wp_update_term($term['term_id'], 'subject', ['name' => $category_name]);
		}
	}
}

/**
 * Upsert product categories
 *
 * @return void
 */
function upsert_product_categories()
{
	foreach (PRODUCT_CATEGORIES as $category_term => $category_name) {
		$term = term_exists($category_term, 'product_cat');

		if (!$term) {
			wp_insert_term($category_name, 'product_cat', ['slug' => $category_term]);
		} else {
			wp_update_term($term['term_id'], 'product_cat', ['name' => $category_name]);
		}
	}
}

/**
 * Delete categories
 *
 * @param [type] $categories
 * @param [type] $taxonomy
 * @return void
 */
function delete_categories($categories, $taxonomy)
{
	foreach ($categories as $category_term => $category_name) {
		$term = term_exists($category_term, $taxonomy);

		if ($term) {
			$term_id = is_array($term) ? $term['term_id'] : $term;

			wp_delete_term($term_id, $taxonomy);
		}
	}
}

/**
 * Delete post categories
 *
 * @return void
 */
function delete_post_categories()
{
	foreach (POST_CATEGORIES as $category_term => $category_name) {
		$term = term_exists($category_term, 'category');

		if ($term) {
			$term_id = is_array($term) ? $term['term_id'] : $term;

			wp_delete_term($term_id, 'category');
		}
	}
}

/**
 * Delete subject categories
 *
 * @return void
 */
function delete_subject_categories()
{
	foreach (SUBJECT_CATEGORIES as $category_term => $category_name) {
		$term = term_exists($category_term, 'subject');

		if ($term) {
			$term_id = is_array($term) ? $term['term_id'] : $term;

			wp_delete_term($term_id, 'subject');
		}
	}
}

/**
 * Delete product categories
 *
 * @return void
 */
function delete_product_categories()
{
	foreach (PRODUCT_CATEGORIES as $category_term => $category_name) {
		$term = term_exists($category_term, 'product_cat');

		if ($term) {
			$term_id = is_array($term) ? $term['term_id'] : $term;

			wp_delete_term($term_id, 'product_cat');
		}
	}
}

/**
 * Upsert subject posts
 *
 * @return void
 */
function upsert_subject_posts()
{
	foreach (SUBJECT_CATEGORIES as $category_term => $category_name) {
		$query = new WP_Query(array(
			'title'      => $category_name,
			'post_type'  => 'subject',
			'post_status' => 'any',
			'fields'     => 'ids'
		));

		if (!$query->have_posts()) {
			$post_id = wp_insert_post(array(
				'post_title' => $category_name,
				'post_name'     => $category_term,
				'post_type' => 'subject',
				'post_status' => 'publish'
			));

			wp_set_object_terms($post_id, $category_term, 'subject');
			wp_set_object_terms($post_id, 'Featured ' . ucfirst('subject'), 'category');
		}

		wp_reset_postdata();
	}
}

/**
 * upsert product posts
 *
 * @return void
 */
function upsert_product_posts()
{
	$levels = ['Certificate', 'Pathway', 'Diploma'];
	$suffixes = ['A', 'B', 'C'];

	foreach (PRODUCT_CATEGORIES as $category_term => $category_name) {
		foreach ($levels as $level) {
			foreach ($suffixes as $suffix) {
				$query = new WP_Query(array(
					'title'      => $level . ' in ' . $category_name . ' ' . $suffix,
					'post_type'  => 'product',
					'post_status' => 'any',
					'fields'     => 'ids'
				));

				if (!$query->have_posts()) {
					$post_id = wp_insert_post(array(
						'post_title'    => $level . ' in ' . $category_name . ' ' . $suffix,
						'post_type'     => 'product',
						'post_status' => 'publish'
					));

					wp_set_object_terms($post_id, $category_term, 'product_cat');
				}

				wp_reset_postdata();
			}
		}
	}
}

/**
 * Upsert pages
 *
 * @return void
 */
function upsert_pages()
{
	foreach (PAGES as $page_slug => $page_name) {
		$query = new WP_Query(array(
			'name'      => $page_slug,
			'post_type'  => 'page',
			'post_status' => 'any',
			'numberposts' => 1
		));

		if (!$query->have_posts()) {
			$page_id = wp_insert_post(array(
				'post_title'    => $page_name,
				'post_name'     => $page_slug,
				'post_type'     => 'page',
				'post_content'  => '',
				'post_status'   => 'publish'
			));
		}
	}
}

add_action('admin_init', function () {
	// upsert_categories(POST_CATEGORIES, 'category');
	// upsert_categories(SUBJECT_CATEGORIES, 'subject');
	// upsert_categories(PRODUCT_CATEGORIES, 'product_cat');

	// delete_categories(POST_CATEGORIES, 'category');
	// delete_categories(SUBJECT_CATEGORIES, 'subject');
	// delete_categories(PRODUCT_CATEGORIES, 'product_cat');

	// upsert_subject_posts();
	// upsert_product_posts();
	// upsert_pages();
});

if (defined('WP_CLI') && WP_CLI) {
	WP_CLI::add_command('upsert-post-categories', 'upsert_post_categories');
	WP_CLI::add_command('upsert-subject-categories', 'upsert_subject_categories');
	WP_CLI::add_command('upsert-product-categories', 'upsert_product_categories');

	WP_CLI::add_command('delete-post-categories', 'delete_post_categories');
	WP_CLI::add_command('delete-subject-categories', 'delete_subject_categories');
	WP_CLI::add_command('delete-product-categories', 'delete_product_categories');

	WP_CLI::add_command('upsert-subject-posts', 'upsert_subject_posts');
	WP_CLI::add_command('upsert-product-posts', 'upsert_product_posts');
	WP_CLI::add_command('upsert-pages', 'upsert_pages');
}
