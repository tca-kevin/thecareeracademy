<?php

/**
 * Check footer render condition
 *
 * @param [type] $field_name_id
 * @return void
 */
function check_footer_render_condition()
{
	$current_post_id = get_the_ID();

	global $redis;

	$cache_key = 'wp:tca:is_footer_allowed_on_post_' . $current_post_id;

	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$is_allowed = check_if_post_is_allowed($current_post_id, 'footer_include_pages', 'footer_exclude_pages') &&
		check_if_post_s_categories_are_allowed($current_post_id, 'footer_include_categories', 'footer_exclude_categories', 'category') &&
		check_if_post_s_categories_are_allowed($current_post_id, 'footer_include_product_categories', 'footer_exclude_product_categories', 'product_cat') &&
		check_if_post_s_categories_are_allowed($current_post_id, 'footer_include_subject_categories', 'footer_exclude_subject_categories', 'subject');

	$redis->setex($cache_key, 86400, serialize($is_allowed));

	return $is_allowed;
}
