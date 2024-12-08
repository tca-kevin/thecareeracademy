<?php

/**
 * Die dumping
 *
 * @param [type] $value
 * @return void
 */
function dd($value)
{
	d($value);
	die();
}

/**
 * Print 'debug-screens' if in development mode
 *
 * @return void
 */
function print_debug_screens_if_in_development_mode()
{
	return file_exists(__DIR__ . '/../dev.flag') ? 'debug-screens' : '';
}

/**
 * Check if post is allowed
 *
 * @param [type] $current_post_id
 * @param [type] $include_field_name
 * @param [type] $exclude_field_name
 * @return void
 */
function check_if_post_is_allowed($current_post_id, $include_field_name, $exclude_field_name)
{
	$include_pages = get_field($include_field_name, 'option');
	$exclude_pages = get_field($exclude_field_name, 'option');

	$include_page_ids = wp_list_pluck($include_pages, 'ID');
	$exclude_page_ids = wp_list_pluck($exclude_pages, 'ID');

	if (!$include_pages && !$exclude_pages) {
		return true;
	}

	if ($include_pages && !$exclude_pages) {
		return in_array($current_post_id, $include_page_ids);
	}

	if (!$include_pages && $exclude_pages) {
		return !in_array($current_post_id, $exclude_page_ids);
	}

	if ($include_pages && $exclude_pages) {
		return in_array($current_post_id, $include_page_ids) && !in_array($current_post_id, $exclude_page_ids);
	}

	return false;
}

/**
 * Check if post's categories are allowed
 *
 * @param [type] $taxonomy
 * @param [type] $include_field_name
 * @param [type] $exclude_field_name
 * @param [type] $current_post_id
 * @return void
 */
function check_if_post_s_categories_are_allowed($taxonomy, $current_post_id, $include_field_name, $exclude_field_name)
{
	$current_categories = get_the_terms($current_post_id, $taxonomy);
	$current_category_ids = wp_list_pluck($current_categories, 'term_id');

	$include_categories = get_field($include_field_name, 'option');
	$exclude_categories = get_field($exclude_field_name, 'option');

	$include_category_ids =  wp_list_pluck($include_categories, 'term_id');
	$exclude_category_ids = wp_list_pluck($exclude_categories, 'term_id');

	if (!$include_categories && !$exclude_categories) {
		return true;
	}

	if ($include_categories && !$exclude_categories) {
		return array_intersect($current_category_ids, $include_category_ids);
	}

	if (!$include_categories && $exclude_categories) {
		return !array_intersect($current_category_ids, $exclude_category_ids);
	}

	if ($include_categories && $exclude_categories) {
		return array_intersect($current_category_ids, $include_category_ids) && !array_intersect($current_category_ids, $exclude_category_ids);
	}

	return false;
}

/**
 * Check render condition
 *
 * @param [type] $field_name_id
 * @return void
 */
function check_render_condition($field_name)
{
	$current_post_id = get_the_ID();

	global $redis;

	$cache_key = 'wp:tca:is_' . $field_name . '_allowed_on_post_' . $current_post_id;

	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$is_allowed = check_if_post_is_allowed($current_post_id, $field_name . '_include_pages', $field_name . '_exclude_pages') &&
		check_if_post_s_categories_are_allowed('category', $current_post_id, $field_name . '_include_categories', $field_name . '_exclude_categories') &&
		check_if_post_s_categories_are_allowed('product_cat', $current_post_id, $field_name . '_include_product_categories', $field_name . '_exclude_product_categories') &&
		check_if_post_s_categories_are_allowed('subject', $current_post_id, $field_name . '_include_subject_categories', $field_name . '_exclude_subject_categories');

	$redis->setex($cache_key, 86400, serialize($is_allowed));

	return $is_allowed;
}

/**
 * Check if post is allowed for flexible content
 *
 * @param [type] $current_post_id
 * @param [type] $include_field_name
 * @param [type] $exclude_field_name
 * @return void
 */
function check_if_post_is_allowed_for_flexible_content($current_post_id, $include_pages, $exclude_pages)
{
	$include_page_ids = wp_list_pluck($include_pages, 'ID');
	$exclude_page_ids = wp_list_pluck($exclude_pages, 'ID');

	if (!$include_pages && !$exclude_pages) {
		return true;
	}

	if ($include_pages && !$exclude_pages) {
		return in_array($current_post_id, $include_page_ids);
	}

	if (!$include_pages && $exclude_pages) {
		return !in_array($current_post_id, $exclude_page_ids);
	}

	if ($include_pages && $exclude_pages) {
		return in_array($current_post_id, $include_page_ids) && !in_array($current_post_id, $exclude_page_ids);
	}

	return false;
}

/**
 * Check if post's categories are allowed for flexible content
 *
 * @param [type] $taxonomy
 * @param [type] $include_field_name
 * @param [type] $exclude_field_name
 * @param [type] $current_post_id
 * @return void
 */
function check_if_post_s_categories_are_allowed_for_flexible_content($taxonomy, $current_post_id, $include_categories, $exclude_categories)
{
	$current_categories = get_the_terms($current_post_id, $taxonomy);
	$current_category_ids = wp_list_pluck($current_categories, 'term_id');

	$include_category_ids =  wp_list_pluck($include_categories, 'term_id');
	$exclude_category_ids = wp_list_pluck($exclude_categories, 'term_id');

	if (!$include_categories && !$exclude_categories) {
		return true;
	}

	if ($include_categories && !$exclude_categories) {
		return array_intersect($current_category_ids, $include_category_ids);
	}

	if (!$include_categories && $exclude_categories) {
		return !array_intersect($current_category_ids, $exclude_category_ids);
	}

	if ($include_categories && $exclude_categories) {
		return array_intersect($current_category_ids, $include_category_ids) && !array_intersect($current_category_ids, $exclude_category_ids);
	}

	return false;
}

/**
 * Check render condition for flexible content
 *
 * @param [type] $field_name_id
 * @return void
 */
function check_render_condition_for_flexible_content($field_name, $include_pages, $include_categories, $include_product_categories, $include_subject_categories, $exclude_pages, $exclude_categories, $exclude_product_categories, $exclude_subject_categories)
{
	$current_post_id = get_the_ID();

	global $redis;

	$cache_key = 'wp:tca:is_' . $field_name . '_allowed_on_post_' . $current_post_id;

	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$is_allowed = check_if_post_is_allowed_for_flexible_content($current_post_id, $include_pages, $exclude_pages) &&
		check_if_post_s_categories_are_allowed_for_flexible_content('category', $current_post_id, $include_categories, $exclude_categories) &&
		check_if_post_s_categories_are_allowed_for_flexible_content('product_cat', $current_post_id, $include_product_categories, $exclude_product_categories) &&
		check_if_post_s_categories_are_allowed_for_flexible_content('subject', $current_post_id, $include_subject_categories, $exclude_subject_categories);

	$redis->setex($cache_key, 86400, serialize($is_allowed));

	return $is_allowed;
}
