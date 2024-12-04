<?php

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
			$menu_array[$menu_item->ID]['depth'] = 1;
		}
	}

	return $menu_array;
}

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
			$menu_array[$menu_index]['children'][$menu_current_item->ID]['depth'] = $menu_depth + 1;

			return $menu_array;
		}
	}

	return $menu_array;
}

function render_menu_items($menu_items, $menu_depth)
{
	$menu_depth++;

	echo '<ul class="' . $menu_depth . '">';

	foreach ($menu_items as $menu_item) {
		echo '<li>';
		echo '<a href="' . $menu_item['url'] . '" aria-label="' . $menu_item['title'] . '">' . $menu_item['title'] . '</a>';
		if (isset($menu_item['children'])) {
			render_menu_items($menu_item['children'], $menu_depth);
		}
		echo '</li>';
	}

	echo '</ul>';
}

$menu_items = menu_build_tree(wp_get_nav_menu_items(get_nav_menu_locations()['header']));
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(debug_screens()); ?>>
	<?php wp_body_open(); ?>
	<header class="shadow-md">
		<div class="container mx-auto px-4 flex justify-start items-center gap-x-8 h-20">
			<a href="<?php echo home_url(); ?>" aria-label="<?php echo __('Company Logo', 'thecareeracademy'); ?>">
				<svg class="h-16 transition-all hover:fill-green-500" version="1.1" id="The_Career_Academy" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
					y="0px" viewBox="0 0 130.4 48" style="enable-background:new 0 0 130.4 48;" xml:space="preserve">
					<g>
						<polygon points="54,14.5 56.8,14.5 56.8,5.6 60.7,5.6 60.7,3.4 50.2,3.4 50.2,5.6 54,5.6 	" />
						<path d="M64.7,10.6c0-1.4,0.8-2.2,2-2.2s1.8,0.7,1.8,2.1v4h2.7v-4.3c0-2.5-1.2-3.8-3.4-3.8c-1.5,0-2.6,0.6-3.2,1.8V3.4h-2.7v11.1
		h2.7V10.6L64.7,10.6z" />
						<path d="M55.6,29.5c3.4,0,5.4-1.7,5.9-4.2h-2.9c-0.3,1.2-1.3,2-2.9,2c-2.1,0-3.4-1.4-3.4-3.6s1.3-3.7,3.3-3.7c1.6,0,2.7,0.8,3,2.3
		h2.9c-0.3-2.6-2.4-4.5-5.8-4.5c-3.8,0-6.3,2.4-6.3,5.9S51.7,29.5,55.6,29.5L55.6,29.5z" />
						<path d="M71.6,24.5c0-2.3-1.4-3.3-4.3-3.3c-2.6,0-4.4,1.1-4.6,2.9h2.7c0.1-0.8,0.8-1.2,1.8-1.2s1.7,0.4,1.7,1.3v0.2L66,24.6
		c-1.4,0.1-2.2,0.4-2.7,0.8c-0.5,0.4-0.8,1-0.8,1.7c0,1.5,1.2,2.4,3.2,2.4c1.7,0,2.9-0.6,3.4-1.6c0,0.5,0,1,0.1,1.3h2.6
		c-0.1-0.5-0.2-1.3-0.2-2.3L71.6,24.5L71.6,24.5z M69,26.1c0,1-0.9,1.7-2.3,1.7c-0.9,0-1.5-0.3-1.5-0.9c0-0.6,0.5-0.9,1.6-1.1
		l2.2-0.2L69,26.1L69,26.1z" />
						<path d="M73.8,21.4v7.8h2.7v-2.9c0-0.9,0.2-1.6,0.7-2.1c0.4-0.4,1-0.6,1.8-0.6c0.3,0,0.5,0,0.8,0.1v-2.4c-0.2,0-0.3,0-0.5,0
		c-1.5,0-2.6,0.9-3,2.4v-2.2L73.8,21.4L73.8,21.4z" />
						<path d="M80.4,25.4c0,2.6,1.8,4.1,4.9,4.1c2.7,0,4.1-1.1,4.4-2.5h-2.5c-0.2,0.3-0.8,0.7-1.9,0.7c-1.4,0-2.3-0.6-2.4-1.7h6.9v-0.6
		c0-2.6-1.7-4.1-4.7-4.1S80.4,22.7,80.4,25.4L80.4,25.4z M85.1,22.7c1.3,0,2.1,0.6,2.1,1.7v0H83C83.1,23.4,83.9,22.7,85.1,22.7
		L85.1,22.7z" />
						<path d="M107.8,23.7v-2.4c-0.2,0-0.3,0-0.5,0c-1.5,0-2.6,0.9-3,2.4v-2.2h-2.4v7.8h2.7v-2.9c0-0.9,0.2-1.6,0.7-2.1
		c0.4-0.4,1-0.6,1.8-0.6C107.3,23.6,107.6,23.6,107.8,23.7L107.8,23.7z" />
						<path d="M66.8,37.8c1.1,0,1.8,0.5,2,1.4l2.6,0c-0.3-1.9-1.9-3.3-4.6-3.3c-3.1,0-4.9,1.6-4.9,4.1s1.9,4.2,4.9,4.2
		c2.8,0,4.3-1.3,4.6-3.2h-2.6c-0.2,0.8-0.9,1.3-2,1.3c-1.3,0-2.1-0.8-2.1-2.3C64.7,38.5,65.5,37.8,66.8,37.8L66.8,37.8z" />
						<path d="M81.7,39.2c0-2.3-1.4-3.3-4.3-3.3c-2.6,0-4.4,1.1-4.6,2.9h2.7c0.1-0.8,0.8-1.2,1.8-1.2S79,38,79,38.8v0.2l-2.9,0.3
		c-1.4,0.1-2.2,0.4-2.7,0.8c-0.5,0.4-0.8,1-0.8,1.7c0,1.5,1.2,2.4,3.2,2.4c1.7,0,2.9-0.6,3.4-1.6c0,0.5,0,1,0.1,1.3h2.6
		c-0.1-0.5-0.2-1.3-0.2-2.3L81.7,39.2L81.7,39.2z M79,40.9c0,1-0.9,1.7-2.3,1.7c-0.9,0-1.5-0.3-1.5-0.9c0-0.6,0.5-0.9,1.6-1.1
		l2.2-0.2L79,40.9L79,40.9z" />
						<path d="M90.1,37.2c-0.6-0.9-1.6-1.3-3-1.3c-2.4,0-4,1.7-4,4.1s1.6,4.1,3.9,4.1c1.5,0,2.6-0.6,3.2-1.7V44h2.6V32.8h-2.7L90.1,37.2
		L90.1,37.2z M90.2,40.3c0,1.2-0.9,2.1-2.1,2.1c-1.3,0-2.2-0.9-2.2-2.4s0.8-2.3,2.1-2.3s2.2,0.8,2.2,2.1V40.3L90.2,40.3z" />
						<path d="M116.9,35.9c-1.4,0-2.4,0.6-3.1,1.8c-0.5-1.2-1.4-1.8-2.8-1.8c-1.4,0-2.4,0.6-2.9,1.8v-1.6h-2.6V44h2.7v-4.1
		c0-1.3,0.6-2,1.7-2c1,0,1.5,0.6,1.5,1.9V44h2.7v-4.1c0-1.2,0.6-2,1.7-2c1,0,1.5,0.6,1.5,1.9V44h2.7v-4.6
		C119.9,37.1,118.8,35.9,116.9,35.9L116.9,35.9z" />
						<path d="M127.6,36.1l-1.9,4.8c-0.1,0.4-0.2,0.6-0.2,0.9h0c-0.1-0.3-0.1-0.5-0.3-0.9l-1.8-4.8h-3l3.6,7.7l-2.1,3.9h3l5.4-11.6
		L127.6,36.1L127.6,36.1z" />
						<path d="M54,32.8L48.7,44h3.4l0.9-2.2h4.9l0.9,2.2h3.4l-5.3-11.1H54L54,32.8z M53.8,39.7l0.9-2.1c0.4-0.9,0.6-1.5,0.8-2.4h0
		c0.2,0.8,0.4,1.5,0.8,2.4l0.8,2.1H53.8L53.8,39.7z" />
						<path d="M95.7,29.5c2.7,0,4.1-1.1,4.4-2.5h-2.5c-0.2,0.3-0.8,0.7-1.9,0.7c-1.4,0-2.3-0.6-2.4-1.7h6.9v-0.6c0-2.6-1.7-4.1-4.7-4.1
		s-4.7,1.6-4.7,4.2S92.6,29.5,95.7,29.5L95.7,29.5z M95.5,22.7c1.3,0,2.1,0.6,2.1,1.7v0h-4.2C93.4,23.4,94.2,22.7,95.5,22.7
		L95.5,22.7z" />
						<path d="M99.2,35.9c-2.9,0-4.7,1.6-4.7,4.2s1.8,4.1,4.9,4.1c2.7,0,4.1-1.1,4.4-2.5h-2.5c-0.2,0.3-0.8,0.7-1.9,0.7
		c-1.4,0-2.3-0.6-2.4-1.7h6.9V40C103.9,37.4,102.2,35.9,99.2,35.9L99.2,35.9z M101.3,39.2H97c0.1-1.1,0.9-1.8,2.2-1.8
		C100.5,37.4,101.3,38.1,101.3,39.2L101.3,39.2L101.3,39.2z" />
						<path d="M77.5,14.7c2.7,0,4.1-1.1,4.4-2.5h-2.5c-0.2,0.3-0.8,0.7-1.9,0.7c-1.4,0-2.3-0.6-2.4-1.7h6.9v-0.6c0-2.6-1.7-4.1-4.7-4.1
		s-4.7,1.6-4.7,4.2S74.5,14.7,77.5,14.7L77.5,14.7z M77.4,8c1.3,0,2.1,0.6,2.1,1.7v0h-4.2C75.3,8.6,76.1,8,77.4,8L77.4,8z" />
					</g>
					<path d="M38.8,3.3h-3.2V0.8c0-0.5-0.4-0.8-0.8-0.8c-4.5,0-10.1,2-13.6,5.3c-0.5,0.5-1,1.1-1.4,1.8c-0.4-0.7-0.9-1.3-1.4-1.8
	C15,2,9.4,0,4.9,0C4.4,0,4,0.4,4,0.8v2.4H0.8C0.4,3.3,0,3.6,0,4.1v24C0,39.1,8.9,48,19.8,48s19.8-8.9,19.8-19.8v-24
	C39.7,3.6,39.3,3.3,38.8,3.3L38.8,3.3z M20.7,8.8c1.1-2,3.1-3.8,5.8-5.1c2.4-1.2,5-1.9,7.5-2v21.5c-3,0.1-5.8,0.9-8.3,2.3
	c-1.8,1-3.5,2.2-4.9,3.7L20.7,8.8L20.7,8.8z M19.8,32.3c0.3,0,0.6-0.1,0.8-0.3c1.3-1.3,2.9-2.1,5-2.5c-0.6,2.7-3,4.6-5.8,4.6
	s-5.2-1.9-5.8-4.6c2.1,0.5,3.6,1.3,5,2.5C19.2,32.2,19.5,32.3,19.8,32.3L19.8,32.3z M19.8,38.2c-5.2,0-9.5-4-9.9-9.1
	c0.9,0,1.7,0.1,2.4,0.2c0.5,3.8,3.7,6.6,7.5,6.6s7-2.8,7.5-6.6c0.7-0.1,1.5-0.1,2.4-0.2C29.4,34.2,25.1,38.2,19.8,38.2L19.8,38.2z
	 M31.5,29h2.4c-0.2,3.5-1.7,6.7-4.2,9.2c-2.6,2.6-6.2,4.1-9.9,4.1s-7.2-1.4-9.9-4.1c-2.5-2.5-4-5.7-4.2-9.2h2.4
	c0.2,2.9,1.4,5.6,3.5,7.6c2.2,2.1,5.1,3.3,8.1,3.3s5.9-1.2,8.1-3.3C30,34.6,31.3,31.9,31.5,29L31.5,29z M5.7,1.7
	c2.5,0.1,5.2,0.9,7.5,2C15.9,5.1,18,6.9,19,8.8v20.3c-1.4-1.5-3.1-2.8-4.9-3.7c-2.6-1.4-5.4-2.1-8.3-2.3L5.7,1.7L5.7,1.7z M1.7,5H4
	V24c0,0.5,0.4,0.8,0.8,0.8c3,0,5.8,0.7,8.4,2c1.2,0.6,2.3,1.3,3.1,1.9c-1.4-0.6-2.6-1-3.9-1.2c-1.2-0.2-2.1-0.2-3.7-0.2H1.7L1.7,5
	L1.7,5z M19.8,46.3c-9.7,0-17.7-7.7-18.1-17.3h2.4c0.2,3.9,1.8,7.6,4.7,10.4c3,2.9,6.9,4.5,11.1,4.5s8.1-1.6,11.1-4.5
	c2.8-2.8,4.5-6.5,4.7-10.4H38C37.5,38.6,29.6,46.3,19.8,46.3L19.8,46.3z M38,27.3h-7.2c-1.6,0-2.4,0-3.7,0.2
	c-1.2,0.2-2.5,0.6-3.9,1.2c0.8-0.6,1.9-1.3,3.1-1.9c2.6-1.3,5.4-2,8.4-2c0.5,0,0.8-0.4,0.8-0.8V4.9H38L38,27.3L38,27.3z" />
					<g>
						<polygon points="11.5,11.3 13.3,11.3 13.3,8.6 15,8.6 15,7.4 9.7,7.4 9.7,8.6 11.5,8.6 	" />
						<path d="M12.5,16.8h0.2c0.9,0,1.8-0.3,2.1-0.4V15c-0.2,0.1-1.1,0.5-2.1,0.5c-1.1,0-1.4-0.4-1.4-0.9v-0.1c0-0.4,0.4-0.8,1.4-0.8
		s1.8,0.4,2.1,0.5v-1.4c-0.4-0.2-1.2-0.4-2-0.4h-0.1c-2.6,0-3.2,1.3-3.2,2.1v0.2C9.5,15.4,9.9,16.8,12.5,16.8L12.5,16.8z" />
						<path d="M13.5,17.8h-2.5l-1.9,4H11l0.2-0.5h2.1l0.3,0.5h2L13.5,17.8z M11.7,20.3l0.6-1.4l0.6,1.4H11.7z" />
					</g>
					<g>
						<path d="M24.6,11.2c0.2,0,0.4-0.1,0.5-0.2c1.5-1.2,3-1.9,5.1-2.3c0.5-0.1,0.7-0.5,0.6-1c-0.1-0.5-0.5-0.7-1-0.6
		c-2.4,0.5-4.1,1.3-5.8,2.6c-0.4,0.3-0.4,0.8-0.1,1.2C24.1,11,24.4,11.2,24.6,11.2L24.6,11.2z" />
						<path d="M24.6,16.4c0.2,0,0.4-0.1,0.5-0.2c1.5-1.2,3-1.9,5.1-2.3c0.5-0.1,0.7-0.5,0.6-1c-0.1-0.5-0.5-0.7-1-0.6
		c-2.4,0.5-4.1,1.3-5.8,2.6c-0.4,0.3-0.4,0.8-0.1,1.2C24.1,16.3,24.4,16.4,24.6,16.4L24.6,16.4z" />
						<path d="M24.6,21.6c0.2,0,0.4-0.1,0.5-0.2c1.5-1.2,3-1.9,5.1-2.3c0.5-0.1,0.7-0.5,0.6-1c-0.1-0.5-0.5-0.7-1-0.6
		c-2.4,0.5-4.1,1.3-5.8,2.6c-0.4,0.3-0.4,0.8-0.1,1.2C24.1,21.5,24.4,21.6,24.6,21.6L24.6,21.6z" />
					</g>
				</svg>
			</a>
			<nav class="relative z-10 h-full lg:flex hidden items-center">
				<ul class="h-full flex items-center list-none p-0 m-0">
					<?php $w = 0;
					foreach ($menu_items as $menu_item_index => $menu_item) { ?>
						<li class="h-full flex relative group" x-data="{ show_menu_item_child_<?php echo $menu_item_index; ?>: false }" x-on:mouseover="show_menu_item_child_<?php echo $menu_item_index; ?> = true" x-on:mouseover.away="show_menu_item_child_<?php echo $menu_item_index; ?> = false">
							<a href="<?php echo $menu_item['url']; ?>" aria-label="<?php echo $menu_item['title']; ?>" class="flex items-center gap-x-2 font-sans font-semibold text-lg text-black text-nowrap px-4 no-underline">
								<span x-bind:class="{ 'transition-all text-green-500': show_menu_item_child_<?php echo $menu_item_index; ?> }"><?php echo $menu_item['title']; ?></span>
								<?php if (isset($menu_item['children'])) { ?>
									<svg x-bind:class="{ 'transition-all rotate-180': show_menu_item_child_<?php echo $menu_item_index; ?> }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
										<path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
									</svg>
								<?php } ?>
							</a>
							<?php if (isset($menu_item['children'])) { ?>
								<div class="absolute bottom-0 left-0 transform translate-y-full bg-white shadow-md" x-cloak x-show="show_menu_item_child_<?php echo $menu_item_index; ?>" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
									<ul class="flex flex-col list-none p-0 m-0">
										<?php $x = 0;
										foreach ($menu_item['children'] as $menu_item_child_index => $menu_item_child) { ?>
											<li class="h-full flex relative my-0 <?php echo ($x == 0 ? 'mt-2 ' : '') . (($x + 1) == count($menu_item['children']) ? 'mb-2 ' : '') . (count($menu_item['children']) == 1 ? 'my-2 ' : ''); ?> border-solid border-x-8 border-y-0 border-transparent" x-data="{ show_menu_item_grand_child_<?php echo $menu_item_child_index; ?>: false }" x-on:mouseover="show_menu_item_grand_child_<?php echo $menu_item_child_index; ?> = true" x-on:mouseover.away="show_menu_item_grand_child_<?php echo $menu_item_child_index; ?> = false">
												<a href="<?php echo $menu_item_child['url']; ?>" aria-label="<?php echo $menu_item_child['title']; ?>" class="flex justify-between items-center gap-x-2 font-sans font-normal text-base text-black text-nowrap px-4 py-px no-underline w-full" x-bind:class="{ 'transition-all bg-green-500 bg-opacity-10': show_menu_item_grand_child_<?php echo $menu_item_child_index; ?> }">
													<span x-bind:class="{ 'transition-all text-green-500': show_menu_item_grand_child_<?php echo $menu_item_child_index; ?> }"><?php echo $menu_item_child['title']; ?></span>
													<?php if (isset($menu_item_child['children'])) { ?>
														<svg x-bind:class="{ 'transition-all rotate-180': show_menu_item_grand_child_<?php echo $menu_item_child_index; ?> }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
															<path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
														</svg>
													<?php } ?>
												</a>
												<?php if (isset($menu_item_child['children'])) { ?>
													<div class="absolute -top-2 -right-2 transform translate-x-full bg-white shadow-md" x-cloak x-show="show_menu_item_grand_child_<?php echo $menu_item_child_index; ?>" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
														<ul class="flex flex-col list-none p-0 m-0">
															<?php $y = 0;
															foreach ($menu_item_child['children'] as $menu_item_grand_child_index => $menu_item_grand_child) { ?>
																<li class="h-full flex relative my-0 <?php echo ($y == 0 ? 'mt-2 ' : '') . (($y + 1) == count($menu_item_child['children']) ? 'mb-2 ' : '') . (count($menu_item_child['children']) == 1 ? 'my-2 ' : ''); ?> border-solid border-x-8 border-y-0 border-transparent" x-data="{ show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?>: false }" x-on:mouseover="show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?> = true" x-on:mouseover.away="show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?> = false">
																	<a href="<?php echo $menu_item_grand_child['url']; ?>" aria-label="<?php echo $menu_item_grand_child['title']; ?>" class="flex justify-between items-center gap-x-2 font-sans font-normal text-base text-black text-nowrap px-4 py-px no-underline w-full" x-bind:class="{ 'transition-all bg-green-500 bg-opacity-10': show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?> }">
																		<span x-bind:class="{ 'transition-all text-green-500': show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?> }"><?php echo $menu_item_grand_child['title']; ?></span>
																		<?php if (isset($menu_item_grand_child['children'])) { ?>
																			<svg x-bind:class="{ 'transition-all rotate-180': show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?> }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
																				<path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
																			</svg>
																		<?php } ?>
																	</a>
																	<?php if (isset($menu_item_grand_child['children'])) { ?>
																		<div class="absolute -top-2 -right-2 transform translate-x-full bg-white shadow-md" x-cloak x-show="show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?>" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
																			<ul class="flex flex-col list-none p-0 m-0">
																				<?php $z = 0;
																				foreach ($menu_item_grand_child['children'] as $menu_item_grand_grand_child_index => $menu_item_grand_grand_child) { ?>
																					<li class="h-full flex relative my-0 <?php echo ($z == 0 ? 'mt-2 ' : '') . (($z + 1) == count($menu_item_grand_child['children']) ? 'mb-2 ' : '') . (count($menu_item_grand_child['children']) == 1 ? 'my-2 ' : ''); ?> border-solid border-x-8 border-y-0 border-transparent" x-data="{ show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?>: false }" x-on:mouseover="show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?> = true" x-on:mouseover.away="show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?> = false">
																						<a href="<?php echo $menu_item_grand_grand_child['url']; ?>" aria-label="<?php echo $menu_item_grand_grand_child['title']; ?>" class="flex justify-between items-center gap-x-2 font-sans font-normal text-base text-black text-nowrap px-4 py-px no-underline w-full" x-bind:class="{ 'transition-all bg-green-500 bg-opacity-10': show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?> }">
																							<span x-bind:class="{ 'transition-all text-green-500': show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?> }"><?php echo $menu_item_grand_grand_child['title']; ?></span>
																							<?php if (isset($menu_item_grand_grand_child['children'])) { ?>
																								<svg x-bind:class="{ 'transition-all rotate-180': show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?> }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
																									<path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
																								</svg>
																							<?php } ?>
																						</a>
																					</li>
																				<?php
																					$z++;
																				} ?>
																			</ul>
																		</div>
																	<?php } ?>
																</li>
															<?php
																$y++;
															} ?>
														</ul>
													</div>
												<?php } ?>
											</li>
										<?php
											$x++;
										} ?>
									</ul>
								</div>
							<?php } ?>
						</li>
					<?php
						$w++;
					} ?>
				</ul>
			</nav>




			<div x-data="{ show_mobile_menu: false }" class="flex justify-center ml-auto">
				<span x-on:click="show_mobile_menu = true">
					<svg class="size-10 rotate-180 fill-black cursor-pointer transition-all hover:fill-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
						<path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
					</svg>
				</span>
				<div x-dialog x-model="show_mobile_menu" x-cloak class="fixed inset-0 overflow-hidden z-10">
					<div x-dialog:overlay x-transition.opacity class="fixed inset-0 bg-green/25"></div>
					<div class="fixed inset-y-0 right-0 max-w-lg w-full max-h-dvh min-h-dvh">
						<div x-dialog:panel x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="h-full w-full">
							<div class="h-full flex flex-col bg-white shadow-lg overflow-y-auto p-8">
								<div class="absolute right-0 top-0 mr-4 mt-4">
									<div x-on:click="$dialog.close()">
										<svg class="size-10 rotate-180 fill-black cursor-pointer transition-all hover:fill-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
											<path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
										</svg>
									</div>
								</div>
								<div class="space-y-6">
									<h2 x-dialog:title class="font-medium text-gray-800">Edit post</h2>
									<div class="space-y-3">


										<div x-data="{ active: 2 }" class="mx-auto min-h-[16rem] w-full max-w-3xl">
											<div x-data="{
													id: 1,
													get expanded() {
														return this.active === this.id
													},
													set expanded(value) {
														this.active = value ? this.id : null
													},
												}" role="region" class="block border-b border-gray-800/10 pb-4 pt-4 first:pt-0 last:border-b-0 last:pb-0">
												<h2>
													<button
														type="button"
														x-on:click="expanded = !expanded"
														:aria-expanded="expanded"
														class="group flex w-full items-center justify-between text-left font-medium text-gray-800">
														<span class="flex-1">Question #1</span>

														<!-- Heroicons mini chevron-up -->
														<svg x-show="expanded" x-cloak class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
															<path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd"></path>
														</svg>

														<!-- Heroicons mini chevron-down -->
														<svg x-show="!expanded" class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon">
															<path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
														</svg>
													</button>
												</h2>
												<div x-show="expanded" x-collapse>
													<div class="pt-2 text-gray-600 max-w-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam quod natus deleniti architecto eaque consequuntur ex, illo neque iste repellendus modi, quasi ipsa commodi saepe? Provident ipsa nulla earum.</div>


													<!-- child hreeeeeeeeeeeeeeeeeeeeeeeee -->
													<div x-data="{ active2: 2 }" class="mx-auto min-h-[16rem] w-full max-w-3xl">
														<div x-data="{
													id: 1,
													get expanded2() {
														return this.active2 === this.id
													},
													set expanded2(value) {
														this.active2 = value ? this.id : null
													},
												}" role="region" class="block border-b border-gray-800/10 pb-4 pt-4 first:pt-0 last:border-b-0 last:pb-0">
															<h2>
																<button
																	type="button"
																	x-on:click="expanded2 = !expanded2"
																	:aria-expanded="expanded2"
																	class="group flex w-full items-center justify-between text-left font-medium text-gray-800">
																	<span class="flex-1">Question #1</span>

																	<!-- Heroicons mini chevron-up -->
																	<svg x-show="expanded2" x-cloak class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
																		<path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd"></path>
																	</svg>

																	<!-- Heroicons mini chevron-down -->
																	<svg x-show="!expanded2" class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon">
																		<path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
																	</svg>
																</button>
															</h2>
															<div x-show="expanded2" x-collapse>
																<div class="pt-2 text-gray-600 max-w-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam quod natus deleniti architecto eaque consequuntur ex, illo neque iste repellendus modi, quasi ipsa commodi saepe? Provident ipsa nulla earum.</div>
															</div>
														</div>
													</div>
													<!-- child hreeeeeeeeeeeeeeeeeeeeeeeee  -->



												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>




	</header>