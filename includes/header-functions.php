<?php

/**
 * Menu find parent
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
 * Menu build tree
 *
 * @param [type] $menu_location
 * @return void
 */
function menu_build_tree($menu_location)
{
	$menu_items = wp_get_nav_menu_items(get_nav_menu_locations()[$menu_location]);
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
 * Get menu items
 *
 * @param [type] $menu_location
 * @return array
 */
function get_menu_items($menu_location)
{
	global $redis;

	$cache_key = 'wp:tca:menu_items_' . $menu_location;

	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$menu_items = menu_build_tree($menu_location);

	$redis->setex($cache_key, 86400, serialize($menu_items));

	return $menu_items;
}

/**
 * Check header render condition
 *
 * @param [type] $field_name_id
 * @return void
 */
function check_header_render_condition($field_name_id)
{
	$current_post_id = get_the_ID();

	global $redis;

	$cache_key = 'wp:tca:is_header_' . $field_name_id . '_allowed_on_post_' . $current_post_id;

	$cached = $redis->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$is_allowed = check_if_post_is_allowed($current_post_id, 'header_' . $field_name_id . '_include_pages', 'header_' . $field_name_id . '_exclude pages') &&
		check_if_post_s_categories_are_allowed($current_post_id, 'header_' . $field_name_id . '_include_categories', 'header_' . $field_name_id . '_exclude_categories', 'category') &&
		check_if_post_s_categories_are_allowed($current_post_id, 'header_' . $field_name_id . '_include_product_categories', 'header_' . $field_name_id . '_exclude_product_categories', 'product_cat') &&
		check_if_post_s_categories_are_allowed($current_post_id, 'header_' . $field_name_id . '_include_subject_categories', 'header_' . $field_name_id . '_exclude_subject_categories', 'subject');

	$redis->setex($cache_key, 86400, serialize($is_allowed));

	return $is_allowed;
}
