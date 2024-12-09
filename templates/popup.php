<div class="popup fixed z-10 inset-0" style="display: none;">
	<div class="popup-overlay absolute inset-0 bg-green-500/50 cursor-pointer"></div>
	<div class="flex items-center justify-center min-w-screen min-h-screen px-4">
		<div class="relative bg-white w-full sm:w-9/12 lg:w-8/12 xl:w-6/12 2xl:w-4/12 px-4 py-4 shadow-md">
			<svg class="popup-close-button absolute top-0 right-0 size-4 fill-black cursor-pointer transition-all hover:fill-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
				<path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
			</svg>
			<a href="<?php echo $args['image_link']['url']; ?>" aria-label="<?php echo $args['image_link']['title']; ?>" target="<?php echo $args['image_link']['target']; ?>">
				<img data-src="<?php echo $args['image_file']['url']; ?>" alt="<?php echo $args['image_file']['alt']; ?>" width="<?php echo $args['image_file']['width']; ?>" height="<?php echo $args['image_file']['height']; ?>" class="lazy object-contain object-center w-full h-auto" />
			</a>
		</div>
	</div>
</div>