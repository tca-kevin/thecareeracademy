<?php get_header(); ?>
<div class="container mx-auto px-4 mt-48 flex flex-col justify-center items-center gap-y-4">
	<p class="font-sans font-semibold text-8xl lg:text-9xl text-green-500 text-center my-0">404</p>
	<h1 class="font-sans font-semibold text-3xl lg:text-6xl text-black text-center my-0"><?php echo __('Page not found', 'thecareeracademy'); ?></h1>
	<p class="font-sans font-normal text-lg lg:text-xl text-stone-500 text-center my-0"><?php echo __('Sorry, we couldn\'t find the page you\'re looking for.', 'thecareeracademy'); ?></p>
	<a href="<?php echo home_url(); ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base bg-orange-500 text-white no-underline text-center min-w-36 px-5 py-3 rounded-md transition-all hover:bg-orange-400">
		<?php echo __('Back to Home', 'thecareeracademy'); ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
			<path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd" />
		</svg>
	</a>
</div>
<?php get_footer(); ?>