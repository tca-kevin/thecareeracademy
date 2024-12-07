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
	$cache_key = 'wp:tca:menu_items_' . $menu_location;

	$cached = (\TheCareerAcademy\Includes\Redis::getInstance())->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$menu_items = menu_build_tree($menu_location);

	(\TheCareerAcademy\Includes\Redis::getInstance())->setex($cache_key, 86400, serialize($menu_items));

	return $menu_items;
}

/**
 * Invalidate menu items cache on update
 *
 * @return void
 */
function invalidate_menu_items_cache_on_update()
{
	foreach (['header', 'footer'] as $menu_location) {
		$cache_key = 'wp:tca:menu_items_' . $menu_location;

		(\TheCareerAcademy\Includes\Redis::getInstance())->del($cache_key);
	}
}

add_action('wp_update_nav_menu_item', 'menu_cached_tree_invalidation_on_update');

/**
 * Check if check if header is allowed
 *
 * @param [type] $field_name_id
 * @return void
 */
function check_if_header_is_allowed($field_name_id)
{
	$cache_key = 'wp:tca:check_if_header_is_allowed_' . $field_name_id;

	$cached = (\TheCareerAcademy\Includes\Redis::getInstance())->get($cache_key);

	if ($cached) {
		return unserialize($cached);
	}

	$is_allowed = check_if_post_is_allowed('header_' . $field_name_id . '_include_pages', 'header_' . $field_name_id . '_exclude pages') &&
		check_if_post_s_categories_are_allowed('header_' . $field_name_id . '_include_categories', 'header_' . $field_name_id . '_exclude_categories', 'category') &&
		check_if_post_s_categories_are_allowed('header_' . $field_name_id . '_include_product_categories', 'header_' . $field_name_id . '_exclude_product_categories', 'product_cat') &&
		check_if_post_s_categories_are_allowed('header_' . $field_name_id . '_include_subject_categories', 'header_' . $field_name_id . '_exclude_subject_categories', 'subject');

	(\TheCareerAcademy\Includes\Redis::getInstance())->setex($cache_key, 86400, serialize($is_allowed));

	return $is_allowed;
}
