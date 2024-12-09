<div id="map" class="relative -z-10 w-full h-96"></div>
<script>
	window.google_maps_api_key = "<?php echo get_field('google_maps_api_key', 'option'); ?>";
	window.company_lat = <?php echo get_field('company_latitude', 'option'); ?>;
	window.company_lng = <?php echo get_field('company_longitude', 'option'); ?>;
	window.site_icon_url = "<?php echo get_site_icon_url(); ?>";
</script>