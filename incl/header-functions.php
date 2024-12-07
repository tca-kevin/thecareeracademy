<?php

/**
 * Find parent menu item
 *
 * @param [type] $menu_array
 * @param [type] $menu_parent_id
 * @param [type] $menu_current_item
 * @param [type] $menu_depth
 * @return void
 */
function menu_find_parent($menu_array, $menu_parent_id, $menu_current_item, $menu_depth)
{
	foreach ($menu_array as $menu_index => $menu_item) {
		if (isset($menu_item['children'])) {
			$menu_array[$menu_index]['children'] = menu_find_parent(
				$menu_item['children'],
				$menu_parent_id,
				$menu_current_item,
				$menu_depth + 1
			);
		}

		if ($menu_index == $menu_parent_id) {
			$menu_array[$menu_index]['children'][$menu_current_item->ID]['title'] = $menu_current_item->title;
			$menu_array[$menu_index]['children'][$menu_current_item->ID]['url'] = $menu_current_item->url;
			$menu_array[$menu_index]['children'][$menu_current_item->ID]['target'] = $menu_current_item->target;
			$menu_array[$menu_index]['children'][$menu_current_item->ID]['depth'] = $menu_depth + 1;

			return $menu_array;
		}
	}

	return $menu_array;
}

/**
 * Build menu tree
 *
 * @param [type] $menu_items
 * @return void
 */
function menu_build_tree($menu_items)
{
	$menu_array = [];

	foreach ($menu_items as $menu_item) {
		if ($menu_item->menu_item_parent) {
			$menu_depth = 1;
			$menu_array = menu_find_parent(
				$menu_array,
				$menu_item->menu_item_parent,
				$menu_item,
				$menu_depth
			);
		} else {
			$menu_array[$menu_item->ID]['title'] = $menu_item->title;
			$menu_array[$menu_item->ID]['url'] = $menu_item->url;
			$menu_array[$menu_item->ID]['target'] = $menu_item->target;
			$menu_array[$menu_item->ID]['depth'] = 1;
		}
	}

	return $menu_array;
}
/**
 * Cache menu items
 *
 * @param [type] $menu_location
 * @return array
 */
function menu_cached_items($menu_location)
{
	$redis = RedisConnection::getInstance();

	$cache_key = 'wp:tca:menu_items_' . $menu_location;
	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$menu_locations = get_nav_menu_locations();

	if (isset($menu_locations[$menu_location])) {
		$menu_items_raw = wp_get_nav_menu_items($menu_locations[$menu_location]);
		$menu_items = menu_build_tree($menu_items_raw);

		$redis->setex($cache_key, 86400, serialize($menu_items));

		return $menu_items;
	}

	return [];
}

/**
 * Menu cached tree invalidation on update
 *
 * @param [type] $post_id
 * @return void
 */
function menu_cached_tree_invalidation_on_update()
{
	$redis = RedisConnection::getInstance();

	$menu_locations = ['header', 'footer'];

	foreach ($menu_locations as $menu_location) {
		$cache_key = 'wp:tca:menu_items_' . $menu_location;

		$redis->del($cache_key);
	}
}

add_action('wp_update_nav_menu_item', 'menu_cached_tree_invalidation_on_update');

/**
 * Show header
 *
 * @return void
 */
function show_header($field_name_id)
{
	$redis = RedisConnection::getInstance();

	$cache_key = 'wp:tca:show_header_' . $field_name_id;
	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$show_header = is_post_allowed('header_' . $field_name_id . '_include_pages', 'header_' . $field_name_id . '_exclude pages') &&
		is_category_allowed('header_' . $field_name_id . '_include_categories', 'header_' . $field_name_id . '_exclude_categories', 'category') &&
		is_category_allowed('header_' . $field_name_id . '_include_product_categories', 'header_' . $field_name_id . '_exclude_product_categories', 'product_cat') &&
		is_category_allowed('header_' . $field_name_id . '_include_subject_categories', 'header_' . $field_name_id . '_exclude_subject_categories', 'subject');

	$redis->setex($cache_key, 86400, serialize($show_header));

	return $show_header;
}
