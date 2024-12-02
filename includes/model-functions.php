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
 * Upsert subject posts
 *
 * @param [type] $categories
 * @param [type] $post_type
 * @param [type] $taxonomy
 * @param [type] $taxonomy_2
 * @return void
 */
function upsert_subject_posts($categories, $post_type, $taxonomy, $taxonomy_2)
{
	foreach ($categories as $category_term => $category_name) {
		$query = new WP_Query(array(
			'title'      => $category_name,
			'post_type'  => $post_type,
			'post_status' => 'any',
			'fields'     => 'ids',
		));

		if (!$query->have_posts()) {
			$post_id = wp_insert_post(array(
				'post_title' => $category_name,
				'post_type' => $post_type,
				'post_status' => 'publish',
			));

			wp_set_object_terms($post_id, $category_term, $taxonomy);
			wp_set_object_terms($post_id, 'Featured ' . ucfirst($post_type), $taxonomy_2);
		}

		wp_reset_postdata();
	}
}

/**
 * Upsert product posts
 *
 * @param [type] $categories
 * @param [type] $post_type
 * @param [type] $taxonomy
 * @return void
 */
function upsert_product_posts($categories, $post_type, $taxonomy)
{
	$levels = ['Certificate', 'Pathway', 'Diploma'];
	$suffixes = ['A', 'B', 'C'];

	foreach ($categories as $category_term => $category_name) {
		foreach ($levels as $level) {
			foreach ($suffixes as $suffix) {
				$query = new WP_Query(array(
					'title'      => $level . ' in ' . $category_name . ' ' . $suffix,
					'post_type'  => $post_type,
					'post_status' => 'any',
					'fields'     => 'ids',
				));

				if (!$query->have_posts()) {
					$post_id = wp_insert_post(array(
						'post_title'    => $level . ' in ' . $category_name . ' ' . $suffix,
						'post_type'     => $post_type,
						'post_status' => 'publish',
					));

					wp_set_object_terms($post_id, $category_term, $taxonomy);
				}

				wp_reset_postdata();
			}
		}
	}
}

add_action('admin_init', function () {
	$post_categories = [
		'featured-benefit' => 'Featured Benefit',
		'featured-blog' => 'Featured Blog',
		'featured-certificate' => 'Featured Certificate',
		'featured-ebook' => 'Featured Ebook',
		'featured-guide' => 'Featured Guide',
		'featured-occupation' => 'Featured Occupation',
		'featured-partner' => 'Featured Partner',
		'featured-partner-award-winning' => 'Featured Partner Award Winning',
		'featured-story' => 'Featured Story',
		'featured-subject' => 'Featured Subject',
		'featured-testimonial-subject' => 'Featured Testimonial Subject',
		'featured-testimonial-tutor-support' => 'Featured Testimonial Tutor Support',
		'featured-testimonial-career-centre' => 'Featured Testimonial Career Centre',
		'featured-tutor' => 'Featured Tutor'
	];

	$subject_categories = [
		'aat' => 'AAT',
		'accounting' => 'Accounting',
		'administration' => 'Administration',
		'animal-care' => 'Animal Care',
		'beauty-lifestyle' => 'Beauty & Lifestyle',
		'bookkeeping' => 'Bookkeeping',
		'creative' => 'Creative Skills',
		'business' => 'Business',
		'childcare' => 'Childcare',
		'counselling' => 'Couselling',
		'cryptocurrency' => 'Cryptocurrency',
		'excel' => 'Excel',
		'fitness' => 'Fitness',
		'health' => 'Health',
		'Hobby' => 'Hobbies',
		'hospitality-tourism' => 'Hospitality & Tourism',
		'it' => 'IT',
		'leadership' => 'Leadership',
		'management' => 'Management',
		'myob' => 'MYOB',
		'payroll' => 'Payroll',
		'psychology' => 'Psychology',
		'reception' => 'Reception',
		'teaching' => 'Teaching',
		'xero' => 'Xero',
		'zoology' => 'Zoology',
		'add-ons' => 'Add Ons',
		'short-courses' => 'Short Courses',
		'online-course-bundles' => 'Online Course Bundles',
		'internal-product' => 'Internal Product'
	];

	$product_categories = [
		'aat' => 'AAT',
		'accounting' => 'Accounting',
		'administration' => 'Administration',
		'animal-care' => 'Animal Care',
		'beauty-lifestyle' => 'Beauty & Lifestyle',
		'bookkeeping' => 'Bookkeeping',
		'creative' => 'Creative Skills',
		'business' => 'Business',
		'childcare' => 'Childcare',
		'counselling' => 'Couselling',
		'cryptocurrency' => 'Cryptocurrency',
		'excel' => 'Excel',
		'fitness' => 'Fitness',
		'health' => 'Health',
		'hobby' => 'Hobbies',
		'hospitality-tourism' => 'Hospitality & Tourism',
		'it' => 'IT',
		'leadership' => 'Leadership',
		'management' => 'Management',
		'myob' => 'MYOB',
		'oca' => 'OCA',
		'payroll' => 'Payroll',
		'psychology' => 'Psychology',
		'reception' => 'Reception',
		'sct' => 'SCT',
		'teaching' => 'Teaching',
		'xero' => 'Xero',
		'zoology' => 'Zoology',
		'add-ons' => 'Add Ons',
		'short-courses' => 'Short Courses',
		'online-course-bundles' => 'Online Course Bundles',
		'internal-product' => 'Internal Product'
	];

	// upsert_categories($post_categories, 'category');
	// upsert_categories($subject_categories, 'subject');
	// upsert_categories($product_categories, 'product_cat');

	// upsert_subject_posts($subject_categories, 'subject', 'subject', 'category');
	// upsert_product_posts($product_categories, 'product', 'product_cat');

	// delete_categories($post_categories, 'category');
	// delete_categories($subject_categories, 'subject');
	// delete_categories($product_categories, 'product_cat');
});
