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
 * Enable tailwindcss debug screens if in development mode
 *
 * @return void
 */
function debug_screens()
{
	return file_exists(__DIR__ . '/../dev.flag') ? 'debug-screens' : '';
}

/**
 * Is post allowed
 *
 * @param [type] $field_name
 * @return boolean
 */
function is_post_allowed($include_field_name, $exclude_field_name)
{
	$current_post_id = get_the_ID();

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
 * Is catewgory allowed
 *
 * @param [type] $field_name
 * @param [type] $taxonomy
 * @return boolean
 */
function is_category_allowed($include_field_name, $exclude_field_name, $taxonomy)
{
	$current_post_id = get_the_ID();
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
