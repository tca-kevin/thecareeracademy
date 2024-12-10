<div class="container mx-auto px-4 pt-2 relative">
	<a href="<?php echo $args['image_link']['url']; ?>" aria-label="<?php echo $args['image_link']['title']; ?>" target="<?php echo $args['image_link']['target']; ?>">
		<img data-src="<?php echo $args['image_file']['url']; ?>" alt="<?php echo $args['image_file']['alt']; ?>" width="<?php echo $args['image_file']['width']; ?>" height="<?php echo $args['image_file']['height']; ?>" class="lazy object-contain 2xl:object-none object-center w-full 2xl:w-auto h-full 2xl:h-auto" />
	</a>
</div>