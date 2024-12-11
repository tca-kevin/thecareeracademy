<div class="bg-green-500 pb-12 lg:pb-24">
	<div class="container mx-auto px-4 hidden lg:flex flex-wrap items-center justify-start lg:justify-center xl:justify-start gap-x-4 py-6">
		<div class="flex basis-0 items-center gap-x-2">
			<?php if (WP_COUNTRY === 'UK') { ?>
				<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
					<path d="M308 352h-45.495c-6.627 0-12 5.373-12 12v50.848H128V288h84c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12h-84v-63.556c0-32.266 24.562-57.086 61.792-57.086 23.658 0 45.878 11.505 57.652 18.849 5.151 3.213 11.888 2.051 15.688-2.685l28.493-35.513c4.233-5.276 3.279-13.005-2.119-17.081C273.124 54.56 236.576 32 187.931 32 106.026 32 48 84.742 48 157.961V224H20c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h28v128H12c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h296c6.627 0 12-5.373 12-12V364c0-6.627-5.373-12-12-12z"></path>
				</svg>
			<?php } else if (WP_COUNTRY === 'IE') { ?>
				<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
					<path d="M310.706 413.765c-1.314-6.63-7.835-10.872-14.424-9.369-10.692 2.439-27.422 5.413-45.426 5.413-56.763 0-101.929-34.79-121.461-85.449h113.689a12 12 0 0 0 11.708-9.369l6.373-28.36c1.686-7.502-4.019-14.631-11.708-14.631H115.22c-1.21-14.328-1.414-28.287.137-42.245H261.95a12 12 0 0 0 11.723-9.434l6.512-29.755c1.638-7.484-4.061-14.566-11.723-14.566H130.184c20.633-44.991 62.69-75.03 117.619-75.03 14.486 0 28.564 2.25 37.851 4.145 6.216 1.268 12.347-2.498 14.002-8.623l11.991-44.368c1.822-6.741-2.465-13.616-9.326-14.917C290.217 34.912 270.71 32 249.635 32 152.451 32 74.03 92.252 45.075 176H12c-6.627 0-12 5.373-12 12v29.755c0 6.627 5.373 12 12 12h21.569c-1.009 13.607-1.181 29.287-.181 42.245H12c-6.627 0-12 5.373-12 12v28.36c0 6.627 5.373 12 12 12h30.114C67.139 414.692 145.264 480 249.635 480c26.301 0 48.562-4.544 61.101-7.788 6.167-1.595 10.027-7.708 8.788-13.957l-8.818-44.49z"></path>
				</svg>
			<?php } else { ?>
				<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 288 512" xmlns="http://www.w3.org/2000/svg">
					<path d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"></path>
				</svg>
			<?php } ?>
			<p class="font-sans font-bold text-lg xl:text-sm 2xl:text-lg text-white text-nowrap my-0"><?php echo $args['icon_label']; ?></p>
		</div>
		<div class="text-2xl text-white">&bull;</div>
		<div class="flex basis-0 items-center gap-x-2">
			<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
				<path d="M624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z"></path>
			</svg>
			<p class="font-sans font-bold text-lg xl:text-sm 2xl:text-lg text-white text-nowrap my-0"><?php echo $args['icon_label_2']; ?></p>
		</div>
		<div class="text-2xl text-white">&bull;</div>
		<div class="flex basis-0 items-center gap-x-2">
			<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
				<path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path>
			</svg>
			<p class="font-sans font-bold text-lg xl:text-sm 2xl:text-lg text-white text-nowrap my-0"><?php echo $args['icon_label_3']; ?></p>
		</div>
		<div class="text-2xl text-white">&bull;</div>
		<div class="flex basis-0 items-center gap-x-2">
			<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
				<path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"></path>
			</svg>
			<p class="font-sans font-bold text-lg xl:text-sm 2xl:text-lg text-white text-nowrap my-0"><?php echo $args['icon_label_4']; ?></p>
		</div>
		<div class="text-2xl text-white">&bull;</div>
		<div class="flex basis-0 items-center gap-x-2">
			<svg class="size-6 fill-lime-500" aria-hidden="true" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
				<path d="M622.34 153.2L343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"></path>
			</svg>
			<p class="font-sans font-bold text-lg xl:text-sm 2xl:text-lg text-white text-nowrap my-0"><?php echo $args['icon_label_5']; ?></p>
		</div>
	</div>
	<div class="container mx-auto px-4 grid grid-cols-12">
		<div class="col-span-12 lg:col-span-6">
			<p class="font-sans font-bold text-base lg:text-lg text-white text-center lg:text-left my-0 mt-4 lg:mt-12 xl:mt-24 mb-4 lg:mb-12"><?php echo $args['paragraph']; ?></p>
			<h1 class="font-druk-wide font-normal text-2xl sm:text-4xl lg:text-5xl xl:text-6xl text-white text-center lg:text-left mt-0 mb-4 lg:mb-12"><?php echo $args['header']; ?></h1>
			<p class="font-sans font-normal text-lg lg:text-xl text-white text-center lg:text-left mt-0 mb-4 lg:mb-12"><?php echo do_shortcode($args['paragraph_2']); ?></p>
			<div class="flex flex-col lg:flex-row gap-x-4 gap-y-4 mb-8 lg:mb-16">
				<a href="<?php echo $args['button_link']['url']; ?>" aria-label="<?php echo $args['button_link']['title']; ?>" target="<?php echo $args['button_link']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base text-white text-nowrap min-w-36 bg-orange-500 px-4 py-2 border-solid border-2 border-orange-500 rounded-md transition-all hover:bg-orange-400 hover:border-orange-400 hover:shadow-md">
					<?php echo $args['button_link']['title']; ?>
				</a>
				<a href="<?php echo $args['button_link_2']['url']; ?>" aria-label="<?php echo $args['button_link_2']['title']; ?>" target="<?php echo $args['button_link_2']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base text-white text-nowrap min-w-36 bg-transparent px-4 py-2 border-solid border-2 border-white rounded-md transition-all hover:bg-orange-400 hover:border-orange-400 group hover:shadow-md">
					<?php echo $args['button_link_2']['title']; ?>
				</a>
			</div>
			<p class="font-sans font-bold text-base text-white text-center lg:text-left my-0 mb-4"><?php echo $args['paragraph_3']; ?></p>
			<div class="flex justify-center lg:justify-start mb-4">
				<?php get_template_part('templates/components/trustpilot'); ?>
			</div>
			<div class="flex flex-col lg:flex-row items-center gap-x-4 gap-y-2">
				<img data-src="<?php echo $args['image_file']['url']; ?>" alt="<?php echo $args['image_file']['alt']; ?>" width="<?php echo $args['image_file']['width']; ?>" height="<?php echo $args['image_file']['height']; ?>" class="lazy order-2 lg:order-1" />
				<h2 class="font-sans font-bold text-base lg:text-lg text-white text-center lg:text-left my-0 order-1 lg:order-2"><?php echo do_shortcode($args['header_2']); ?></h2>
			</div>
		</div>
		<div class="col-span-6 hidden lg:flex flex-col items-end">
			<div class="relative group mt-12 lg:mt-6 xl:mt-12 mr-8">
				<div class="absolute inset-0 bg-green-600 translate-x-6 translate-y-6 transition-all group-hover:bg-green-400 group-hover:translate-x-8 group-hover:translate-y-8"></div>
				<div class="relative bg-orange-400">
					<style>
						#hero-image-file-2 {
							width: 349px;
						}

						@media (min-width: 1280px) {
							#hero-image-file-2 {
								width: 465px;
							}
						}
					</style>
					<img data-src="<?php echo $args['image_file_2']['url']; ?>" alt="<?php echo $args['image_file_2']['alt']; ?>" width="<?php echo $args['image_file_2']['width']; ?>" height="<?php echo $args['image_file_2']['height']; ?>" id="hero-image-file-2" class="lazy object-cover object-center h-full" />
					<div class="flex flex-col">
						<h3 class="font-sans font-black text-4xl text-white ml-6 2xl:ml-8 mt-6 mb-2"><?php echo $args['header_3']; ?></h3>
						<p class="font-sans font-normal text-xl lg:text-lg xl:text-xl text-white ml-6 2xl:ml-8 mt-0 mb-4 text-wrap">
							<?php echo $args['paragraph_4']; ?>
							<a href="<?php echo $args['anchor_link']['url']; ?>" aria-label="<?php echo $args['anchor_link']['title']; ?>" target="<?php echo $args['anchor_link']['target']; ?>" class="text-white underline">
								<?php echo $args['anchor_link']['title']; ?>
							</a>
						</p>
						<a href="<?php echo $args['button_link_3']['url']; ?>" aria-label="<?php echo $args['button_link_3']['title']; ?>" target="<?php echo $args['button_link_3']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 self-start font-sans font-semibold text-base text-white text-nowrap min-w-36 bg-transparent px-4 py-2 ml-6 2xl:ml-8 mb-8 border-solid border-2 border-white rounded-md transition-all hover:bg-blue-500 hover:border-blue-500 group hover:shadow-md">
							<?php echo $args['button_link_3']['title']; ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>