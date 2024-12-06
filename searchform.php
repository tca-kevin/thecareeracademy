<form role="search" method="get" action="<?php echo home_url(); ?>" class="grow">
	<div class="relative">
		<input type="search" value="" name="s" placeholder="<?php echo get_field('header_search_placeholder_label', 'option'); ?>" class="w-full px-4 py-2 border-solid border-2 border-stone-100 rounded-md outline-2 outline-orange-500 focus:rounded-md font-sans font-normal text-base text-black placeholder:font-sans placeholder:font-normal placeholder:text-base placeholder:text-stone-200 transition-all">
		<button type="submit" value="" class="bg-white border-none p-0 absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer group">
			<svg class="size-6 fill-green-500 transition-all group-hover:fill-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
				<path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
			</svg>
		</button>
	</div>
</form>