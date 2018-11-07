<!-- 6 SECTION START: SERVICES-->
<section class="paslaugos">
	<div class="container">
		<div class="service-photos flexinam">
			<?php
			// check if the repeater field has rows of data
			if(have_rows('hs_one_service_repeater')):
			    while (have_rows('hs_one_service_repeater')): the_row();
			        // display a sub field value
			        // the_sub_field('sub_field_name');
			    	$image = get_sub_field('service_image');
			    	// dump($image);
			    	$link = get_sub_field('service_link');
			    	// dump($link);
			    	if ($link['target']=='_blank') {
			    		$target = ' target="_blank"';
			    	}else{
			    		$target = '';
			    	}
			    	?>
					<div class="spa">
						<a href="<?php echo $link['url']; ?>" <?php echo $target; ?>>
							<img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>">
							<span class="centered overlayw3">
								<?php the_sub_field('service_title'); ?>
							</span>
						</a>
					</div>	    	
			    	<?php
			    endwhile;
			endif;
			?>
		</div>
	</div>
</section>
<!-- 5 SECTION END: SERVICES-->