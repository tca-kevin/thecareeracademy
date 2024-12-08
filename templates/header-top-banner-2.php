<div class="hidden lg:block sticky z-10 top-0 w-full shadow-sm">
	<div class="bg-orange-500">
		<div class="container mx-auto px-4">
			<div class="font-sans font-medium text-normal text-white text-center py-2">
				<?php
				echo $args['paragraph_before'];
				echo get_field('company_currency', 'option') . get_field('company_payment_plan_price_per_week', 'option');
				echo $args['paragraph_during'];
				if (get_field('company_phone_number', 'option')) {
				?>
					<a href="<?php echo get_field('company_phone_number', 'option')['url']; ?>" aria-label="<?php echo get_field('company_phone_number', 'option')['url']; ?>" target="<?php echo get_field('company_phone_number', 'option')['target']; ?>" class="font-semibold text-white transition-all hover:text-green-500"><?php echo get_field('company_phone_number', 'option')['title']; ?></a>
				<?php
				}
				echo $args['paragraph_after'];
				?>
			</div>
		</div>
	</div>
	<div class="bg-white">
		<div class="container mx-auto px-4 flex justify-center items-center gap-x-4">
			<div class="font-sans font-medium text-normal text-black bg-white py-2">
				<?php echo $args['paragraph_2_before'] . $args['paragraph_2_during'] . $args['paragraph_2_after']; ?>
			</div>
			<a href="<?php echo $args['button_link']['url']; ?>" aria-label="<?php echo $args['button_link']['title']; ?>" target="<?php echo $args['button_link']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base text-white text-nowrap min-w-36 bg-green-500 px-4 py-0 border-solid border-2 border-green-500 rounded-md transition-all hover:text-white hover:bg-orange-400 hover:border-orange-400 hover:shadow-md">
				<?php echo $args['button_link']['title']; ?>
			</a>
		</div>
	</div>
</div>
<div class="block lg:hidden sticky z-10 top-0 w-full shadow-sm">
	<div class="bg-white">
		<div class="container mx-auto px-4 py-2">
			<a href="<?php echo $args['button_link_2']['url']; ?>" aria-label="<?php echo $args['button_link_2']['title']; ?>" target="<?php echo $args['button_link_2']['target']; ?>" class="inline-flex justify-center items-center gap-x-1 font-sans font-semibold text-base text-white text-nowrap min-w-36 w-full bg-orange-500 px-4 py-2 border-solid border-2 border-orange-500 rounded-md transition-all hover:bg-orange-400 hover:border-orange-400 hover:shadow-md">
				<?php echo $args['button_link_2']['title']; ?>
			</a>
		</div>
	</div>
</div>