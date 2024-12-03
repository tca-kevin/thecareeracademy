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
		echo '<a href="' . htmlspecialchars($menu_item['url']) . '">' . htmlspecialchars($menu_item['title']) . '</a>';
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
		<div class="container mx-auto px-4 flex items-center gap-x-8 h-20">
			<a href="<?php echo home_url(); ?>">
				<svg class="h-16 transition-all hover:fill-green-500" version="1.1" id="The_Career_Academy" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
					y="0px" viewBox="0 0 1025.4 377.4" style="enable-background:new 0 0 1025.4 377.4;" xml:space="preserve">
					<g>
						<polygon class="st0" points="424.9,114 446.9,114 446.9,44.1 477.2,44.1 477.2,26.6 394.6,26.6 394.6,44.1 424.9,44.1 	" />
						<path class="st0" d="M509,83.7c0-11.2,5.9-17.6,15.9-17.6s14.4,5.5,14.4,16.4V114h21V80.3c0-19.4-9.2-29.8-26.5-29.8
		c-11.4,0-20.2,4.8-24.9,13.9V26.6h-21V114h21V83.7L509,83.7z" />
						<path class="st0" d="M437.4,232.2c26.7,0,42.2-13.4,46.2-33.2h-22.9c-2.6,9.5-10.3,15.8-22.8,15.8c-16.5,0-26.6-11.3-26.6-28.7
		s9.8-28.8,26.1-28.8c12.9,0,21,6.3,23.3,18.3h22.6c-2.3-20.7-18.9-35.6-45.4-35.6c-29.9,0-49.5,18.6-49.5,46.4
		S406.6,232.2,437.4,232.2L437.4,232.2z" />
						<path class="st0" d="M563,192.7c0-17.9-10.7-26.3-34.1-26.3c-20.8,0-34.5,8.5-36.1,22.5h21.5c0.9-6.1,5.9-9.5,14.4-9.5
		s13,3.3,13,10.2v1.9l-22.9,2.1c-11,1.1-17.1,3-21.4,5.9c-4.3,3.1-6.6,7.8-6.6,13.4c0,11.6,9.7,18.7,25.2,18.7
		c13,0,22.6-4.5,26.7-12.3c0,3.7,0.4,7.5,0.9,10.5h20.8c-1-4.3-1.5-10.1-1.5-18L563,192.7L563,192.7z M542.4,205.4
		c0,8.1-7.4,13.4-18.2,13.4c-7.3,0-11.7-2.7-11.7-7.3c0-4.8,3.6-7.3,12.9-8.4l17-1.7L542.4,205.4L542.4,205.4z" />
						<path class="st0" d="M580,168.2v61.5h21v-23.1c0-6.8,1.5-12.4,5.5-16.2c3.1-3,7.6-4.7,14.2-4.7c2.3,0,4.2,0.1,6.3,0.5V167
		c-1.2-0.2-2.2-0.4-4.1-0.4c-12.1,0-20.3,6.9-23.8,18.6v-17L580,168.2L580,168.2z" />
						<path class="st0" d="M632.4,199.5c0,20.2,14.5,32.1,38.5,32.1c21,0,32-8.6,35-19.7H686c-1.7,2.6-6.6,5.3-14.6,5.3
		c-11.2,0-18.2-5-18.8-13.5h53.9v-4.9c0-20.3-13.4-32.4-36.8-32.4S632.4,178.8,632.4,199.5L632.4,199.5z M669.5,178.5
		c9.8,0,16.4,5,16.4,13.5v0.2h-33.3C653.1,183.6,659.4,178.5,669.5,178.5L669.5,178.5z" />
						<path class="st0" d="M847.9,186.2V167c-1.2-0.2-2.2-0.4-4.1-0.4c-12.1,0-20.3,6.9-23.8,18.6v-17h-19.2v61.5h21v-23.1
		c0-6.8,1.5-12.4,5.5-16.2c3.1-3,7.6-4.7,14.2-4.7C843.9,185.7,845.8,185.8,847.9,186.2L847.9,186.2z" />
						<path class="st0" d="M525.6,297.1c8.5,0,14,3.9,15.8,11.3l20.8,0c-2.4-14.7-14.6-26.2-35.9-26.2c-24,0-38.9,12.3-38.9,32.5
		s15.1,32.7,38.5,32.7c22,0,33.6-10.2,36.3-25h-20.8c-1.9,6.2-7.1,9.9-15.6,9.9c-10.5,0-16.9-6.6-16.9-18
		C508.9,303,515.2,297.1,525.6,297.1L525.6,297.1z" />
						<path class="st0" d="M642.1,308.5c0-17.8-10.7-26.3-34.1-26.3c-20.8,0-34.5,8.5-36.1,22.5h21.5c0.9-6.1,5.9-9.5,14.4-9.5
		s13,3.3,13,10.2v1.9l-22.9,2.1c-11,1.1-17.1,3-21.4,5.9c-4.3,3.1-6.6,7.8-6.6,13.4c0,11.6,9.7,18.7,25.2,18.7
		c13,0,22.6-4.5,26.7-12.3c0,3.7,0.4,7.5,0.9,10.5h20.8c-1-4.3-1.5-10.1-1.5-18L642.1,308.5L642.1,308.5z M621.4,321.2
		c0,8.1-7.4,13.4-18.2,13.4c-7.3,0-11.7-2.7-11.7-7.3c0-4.8,3.6-7.3,12.9-8.4l17-1.7L621.4,321.2L621.4,321.2z" />
						<path class="st0" d="M708.7,292.8c-4.8-7-12.8-10.6-23.5-10.6c-18.8,0-31.6,13-31.6,32.6c0,19.6,12.5,32.6,30.6,32.6
		c11.6,0,20.8-4.9,25.3-13v11.2h20.2v-87.4h-21L708.7,292.8L708.7,292.8z M709,317c0,9.7-6.8,16.2-16.7,16.2c-10.5,0-17-7.3-17-18.7
		c0-11.5,6.2-18.2,16.6-18.2S709,302.6,709,313V317L709,317z" />
						<path class="st0" d="M919,282.2c-10.8,0-19.1,4.8-24.1,14.3c-3.7-9.6-11-14.3-21.8-14.3s-18.6,4.7-22.8,14.1V284h-20.4v61.5h21
		v-31.9c0-10,4.9-15.8,13.2-15.8s11.8,4.9,11.8,15v32.6h21v-32.2c0-9.7,4.9-15.4,13.2-15.4s11.8,4.9,11.8,15v32.6H943v-36.4
		C943,291.8,934.3,282.2,919,282.2L919,282.2z" />
						<path class="st0" d="M1003.6,284l-15,37.8c-1,3-1.5,4.5-1.8,6.8h-0.4c-0.5-2.6-0.9-4.2-2-6.9L970.5,284h-23.3l28.1,60.6l-16.2,30.8
		h23.6l42.6-91.3H1003.6L1003.6,284z" />
						<path class="st0" d="M424.6,258.2l-42,87.4h26.8l6.9-17.3h38.3l6.8,17.3h27l-42-87.4H424.6L424.6,258.2z M422.7,312.3l6.7-16.8
		c2.8-6.8,4.7-12.2,6-18.5h0.4c1.3,6.4,3.1,11.8,6,18.5l6.6,16.8H422.7L422.7,312.3z" />
						<path class="st0" d="M752.3,231.6c21,0,32-8.6,35-19.7h-19.9c-1.7,2.6-6.6,5.3-14.6,5.3c-11.2,0-18.2-5-18.8-13.5h53.9v-4.9
		c0-20.3-13.4-32.4-36.8-32.4s-37.3,12.4-37.3,33.1S728.3,231.6,752.3,231.6L752.3,231.6z M750.8,178.5c9.8,0,16.4,5,16.4,13.5v0.2
		h-33.3C734.4,183.6,740.7,178.5,750.8,178.5L750.8,178.5z" />
						<path class="st0" d="M780,282.2c-22.7,0-37.3,12.4-37.3,33.1s14.5,32.1,38.5,32.1c21,0,32-8.6,35-19.7h-19.9
		c-1.7,2.6-6.6,5.3-14.6,5.3c-11.2,0-18.2-5-18.8-13.5h53.9v-4.9C816.8,294.3,803.4,282.2,780,282.2L780,282.2z M796.2,308h-33.3
		c0.6-8.6,6.9-13.8,17-13.8s16.4,5,16.4,13.5V308L796.2,308z" />
						<path class="st0" d="M609.7,115.8c21,0,32-8.6,35-19.7h-19.9c-1.7,2.6-6.6,5.3-14.6,5.3c-11.2,0-18.2-5.1-18.8-13.5h53.9V83
		c0-20.3-13.4-32.4-36.8-32.4S571.2,63,571.2,83.7S585.7,115.8,609.7,115.8L609.7,115.8z M608.2,62.7c9.8,0,16.4,5.1,16.4,13.5v0.2
		h-33.3C591.9,67.8,598.2,62.7,608.2,62.7L608.2,62.7z" />
					</g>
					<path class="st0" d="M305.4,25.7h-25.1v-19c0-3.7-3-6.6-6.6-6.6C238.2,0,194,15.3,167.1,42c-4.1,4.1-7.7,8.6-11.1,14.4
	c-3.2-5.8-6.9-10.2-11-14.3C118.2,15.4,73.9,0,38.4,0c-3.7,0-6.6,3-6.6,6.6v19H6.6c-3.7,0-6.6,3-6.6,6.6v189.1c0,86,70,156,156,156
	s156-70,156-156V32.3C312,28.6,309,25.7,305.4,25.7L305.4,25.7z M162.7,69.5c8.3-15.4,24.3-29.6,45.4-40.1c18.5-9.2,39.6-14.9,59-16
	v168.8c-23.2,1-45.3,6.9-65.6,17.7c-14.4,7.6-27.6,17.6-38.8,29.4L162.7,69.5L162.7,69.5z M156,254.2c2.6,0,4.9-1.1,6.2-2.4
	c10.5-10.1,22.9-16.3,39.2-20c-4.8,20.9-23.3,36.1-45.4,36.1s-40.6-15.2-45.4-36.1c16.3,3.7,28.6,9.9,39.2,20
	C151.1,253.1,153.2,254.2,156,254.2L156,254.2z M156,300c-41.2,0-74.9-31.3-78.2-71.9c6.8,0.2,13.1,0.6,19,1.3
	c4,29.6,29.1,51.7,59.2,51.7s55.3-22.1,59.2-51.7c5.9-0.7,12.2-1.1,19-1.3C230.9,268.7,197.2,300,156,300L156,300z M247.5,228h18.9
	c-1.6,27.4-13.1,52.8-32.7,72.2c-20.8,20.5-48.4,31.9-77.7,31.9s-56.9-11.3-77.7-31.9c-19.6-19.4-31.2-44.9-32.7-72.2h18.9
	c1.6,22.7,11.4,43.8,27.9,59.6c17.2,16.5,39.8,25.6,63.6,25.6s46.4-9.1,63.6-25.6C236.1,271.8,245.9,250.7,247.5,228L247.5,228z
	 M45,13.4c19.4,1.1,40.6,6.8,59.1,16c21.1,10.5,37.1,24.7,45.4,40.1v159.8c-11.2-11.7-24.4-21.7-38.8-29.4
	c-20.3-10.8-42.4-16.8-65.6-17.7L45,13.4L45,13.4z M13.3,38.9h18.5v149.8c0,3.7,3,6.6,6.6,6.6c23.5,0,45.3,5.8,66,15.8
	c9.6,4.7,17.9,9.9,24.5,15c-11-4.8-20.7-7.8-30.3-9.4c-9.8-1.6-16.4-2-28.8-2H13.3L13.3,38.9L13.3,38.9z M156,364.2
	c-76.5,0-139.1-60.5-142.6-136.1h18.9c1.6,30.9,14.5,59.8,36.7,81.6c23.3,23,54.2,35.7,87,35.7s63.7-12.7,87-35.7
	c22.2-21.9,35.1-50.7,36.7-81.6h18.9C295.2,303.7,232.5,364.2,156,364.2L156,364.2z M298.8,214.8h-56.5c-12.3,0-19,0.4-28.8,2
	c-9.7,1.6-19.3,4.5-30.3,9.4c6.5-5,14.8-10.3,24.5-15c20.7-10,42.5-15.8,66-15.8c3.7,0,6.6-3,6.6-6.6V38.9h18.5L298.8,214.8
	L298.8,214.8z" />
					<g>
						<polygon class="st0" points="90.1,89.2 104.3,89.2 104.3,67.8 117.7,67.8 117.7,58 76.7,58 76.7,67.8 90.1,67.8 	" />
						<path class="st0" d="M98.5,131.9h1.6c6.9,0,13.9-2.1,16.1-3.3v-11.1c-1.6,1.1-8.4,4.1-16.6,4.1c-8.7,0-11.1-3.4-11.1-6.9v-0.5
		c0-3.4,3.1-6.6,11.3-6.6s14.3,2.8,16.4,4v-11.1c-3-1.4-9.2-2.9-15.8-2.9h-0.6c-20.6,0-25.4,9.9-25.4,16.2v1.3
		C74.3,121.4,78.1,131.9,98.5,131.9L98.5,131.9z" />
						<path class="st0" d="M106.5,140.3H87l-15,31.2h14.6l1.9-4.3h16.6l2,4.3h15.4L106.5,140.3z M91.9,159.5l4.8-11.2l4.9,11.2H91.9z" />
					</g>
					<g>
						<path class="st0" d="M193.6,87.7c1.5,0,2.9-0.5,4.1-1.5c11.5-9.3,23.3-14.6,39.8-18.1c3.6-0.8,5.9-4.3,5.1-7.9
		c-0.8-3.6-4.3-5.9-7.9-5.1c-18.5,4-32.1,10.2-45.3,20.8c-2.9,2.3-3.3,6.5-1,9.3C189.8,86.9,191.7,87.7,193.6,87.7L193.6,87.7z" />
						<path class="st0" d="M193.6,128.9c1.5,0,2.9-0.5,4.1-1.5c11.5-9.3,23.3-14.6,39.8-18.1c3.6-0.8,5.9-4.3,5.1-7.9
		c-0.8-3.6-4.3-5.9-7.9-5.1c-18.5,4-32.1,10.2-45.3,20.8c-2.9,2.3-3.3,6.5-1,9.3C189.8,128.1,191.7,128.9,193.6,128.9L193.6,128.9z" />
						<path class="st0" d="M193.6,170.1c1.5,0,2.9-0.5,4.1-1.5c11.5-9.3,23.3-14.6,39.8-18.1c3.6-0.8,5.9-4.3,5.1-7.9
		c-0.8-3.6-4.3-5.9-7.9-5.1c-18.5,4-32.1,10.2-45.3,20.8c-2.9,2.3-3.3,6.5-1,9.3C189.8,169.3,191.7,170.1,193.6,170.1L193.6,170.1z" />
					</g>
				</svg>
			</a>
			<nav class="relative z-10 h-full lg:flex hidden items-center">
				<ul class="h-full flex items-center list-none p-0 m-0">
					<?php $w = 0;
					foreach ($menu_items as $menu_item_index => $menu_item) { ?>
						<li class="h-full flex relative group" x-data="{ show_menu_item_child_<?php echo $menu_item_index; ?>: false }" x-on:mouseover="show_menu_item_child_<?php echo $menu_item_index; ?> = true" x-on:mouseover.away="show_menu_item_child_<?php echo $menu_item_index; ?> = false">
							<a href="<?php echo $menu_item['url']; ?>" class="flex items-center gap-x-2 font-sans font-semibold text-lg text-black text-nowrap px-4 no-underline">
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
												<a href="<?php echo $menu_item_child['url']; ?>" class="flex justify-between items-center gap-x-2 font-sans font-normal text-base text-black text-nowrap px-4 py-px no-underline w-full" x-bind:class="{ 'transition-all bg-green-500 bg-opacity-10': show_menu_item_grand_child_<?php echo $menu_item_child_index; ?> }">
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
																	<a href="<?php echo $menu_item_grand_child['url']; ?>" class="flex justify-between items-center gap-x-2 font-sans font-normal text-base text-black text-nowrap px-4 py-px no-underline w-full" x-bind:class="{ 'transition-all bg-green-500 bg-opacity-10': show_menu_item_grand_grand_child_<?php echo $menu_item_grand_child_index; ?> }">
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
																						<a href="<?php echo $menu_item_grand_grand_child['url']; ?>" class="flex justify-between items-center gap-x-2 font-sans font-normal text-base text-black text-nowrap px-4 py-px no-underline w-full" x-bind:class="{ 'transition-all bg-green-500 bg-opacity-10': show_menu_item_grand_grand_grand_child_<?php echo $menu_item_grand_grand_child_index; ?> }">
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
		</div>
	</header>