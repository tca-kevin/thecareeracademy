<?php get_header(); ?>
<?php the_post(); ?>
<main id="post-<?php the_ID(); ?>" <?php post_class('min-h-full container mx-auto px-4'); ?>>
<h1 class="font-druk-wide font-normal text-2xl lg:text-4xl my-4 lg:my-12"><?php the_title(); ?></h1>
	<article class="font-sans"><?php the_content(); ?></article>
</main>
<?php get_footer(); ?>