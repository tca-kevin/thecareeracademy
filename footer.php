<?php
if (check_render_condition('footer')) {
	get_template_part('templates/footer', 'default');
}
?>
<?php
wp_footer();

foreach (get_field('body_close_scripts', 'option') as $body_close_script) {
	if ($body_close_script['enabled']) {
		echo $body_close_script['script'];
	}
}
?>
</body>

</html>