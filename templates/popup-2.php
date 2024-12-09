<div class="popup fixed z-10 inset-0" style="display: none;">
	<div class="absolute inset-0 bg-green-500/50 cursor-pointer"></div>
	<div class="flex items-center justify-center min-w-screen min-h-screen px-4 my-4">
		<div class="relative bg-white w-full sm:w-9/12 lg:w-10/12 xl:w-9/12 2xl:w-6/12 shadow-md">
			<svg class="popup-close-button absolute top-1 right-1 size-4 fill-black cursor-pointer transition-all hover:fill-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
				<path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
			</svg>
			<div class="flex flex-row flex-wrap justify-content-start items-start">
				<div class="basis-full flex lg:hidden">
					<img data-src="<?php echo $args['image_file_2']['url']; ?>" alt="<?php echo $args['image_file_2']['alt']; ?>" width="<?php echo $args['image_file_2']['width']; ?>" height="<?php echo $args['image_file_2']['height']; ?>" style="height: <?php echo $args['image_file_2']['height']; ?>px;" class="lazy object-contain object-center w-full h-auto" />
				</div>
				<div class="basis-4/12 hidden lg:flex">
					<img data-src="<?php echo $args['image_file']['url']; ?>" alt="<?php echo $args['image_file']['alt']; ?>" width="<?php echo $args['image_file']['width']; ?>" height="<?php echo $args['image_file']['height']; ?>" style="height: <?php echo $args['image_file']['height']; ?>px;" class="lazy object-contain object-center w-full h-auto" />
				</div>
				<div class="basis-full lg:basis-8/12 px-8 py-8">
					<?php echo $args['iframe']; ?>
					<div class="font-sans">
						<?php echo $args['description']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>