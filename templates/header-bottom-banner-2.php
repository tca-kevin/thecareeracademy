<div class="container mx-auto px-4 py-4">
	<a href="<?php echo $args['image_link']['url']; ?>" aria-label="<?php echo $args['image_link']['title']; ?>" target="<?php echo $args['image_link']['target']; ?>" class="block overflow-hidden">
		<img data-src="<?php echo $args['image_file']['url']; ?>" alt="<?php echo $args['image_file']['alt']; ?>" width="<?php echo $args['image_file']['width']; ?>" height="<?php echo $args['image_file']['height']; ?>" style="height: <?php echo $args['image_file']['height']; ?>px;" class="lazy backdrop:overflow-hidden object-contain 2xl:object-none object-center w-full 2xl:w-auto h-full 2xl:h-auto" />
	</a>
</div>