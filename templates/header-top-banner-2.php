<div class="hidden lg:block sticky z-20 top-0 w-full shadow-sm">
	<div class="bg-orange-500">
		<div class="container mx-auto px-4">
			<div class="font-sans font-semibold text-normal text-white text-center py-2">
			<?php echo do_shortcode($args['paragraph']); ?>
			</div>
		</div>
	</div>
	<div class="bg-white">
		<div class="container mx-auto px-4 flex justify-center items-center gap-x-4">
			<div class="font-sans font-semibold text-normal text-black bg-white py-2">
				<?php echo $args['paragraph_2']; ?>
			</div>
			<a href="<?php echo $args['button_link']['url']; ?>" aria-label="<?php echo $args['button_link']['title']; ?>" target="<?php echo $args['button_link']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base text-white text-nowrap min-w-36 bg-green-500 px-4 py-0 border-solid border-2 border-green-500 rounded-md transition-all hover:text-white hover:bg-orange-400 hover:border-orange-400 hover:shadow-md">
				<?php echo $args['button_link']['title']; ?>
			</a>
		</div>
	</div>
</div>
<div class="block lg:hidden sticky z-20 top-0 w-full shadow-sm">
	<div class="bg-white">
		<div class="container mx-auto px-4 py-2">
			<a href="<?php echo $args['button_link_2']['url']; ?>" aria-label="<?php echo $args['button_link_2']['title']; ?>" target="<?php echo $args['button_link_2']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base text-white text-nowrap min-w-36 w-full bg-orange-500 px-4 py-2 border-solid border-2 border-orange-500 rounded-md transition-all hover:bg-orange-400 hover:border-orange-400 hover:shadow-md">
				<?php echo $args['button_link_2']['title']; ?>
			</a>
		</div>
	</div>
</div>