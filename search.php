<?php get_header(); ?>
<main class="container mx-auto px-4">
	<h1 class="font-druk-wide font-normal text-2xl lg:text-4xl my-8 lg:my-12"><?php printf(__('Search Results for: %s', 'thecareeracademy'),  get_search_query()); ?></h1>
	<ul>
		<?php while (have_posts()) {
			the_post();
		?>
			<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<a class="font-sans font-normal text-base text-blue-500 transition-all hover:text-orange-500" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<div class="font-sans font-normal text-base text-black"><?php the_excerpt(); ?></div>
			</li>
		<?php } ?>
	</ul>
</main>
<?php get_footer(); ?>