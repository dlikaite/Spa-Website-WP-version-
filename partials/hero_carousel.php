<!-- 2 SECTION START-->
<section class="carousel">
	<div class="owl-carousel karusele1 owl-theme">
		<?php
		// check if the repeater field has rows of data
		if(have_rows('hhc_hero_carousel_slides_repeater')):
		 	// loop through the rows of data
		    while (have_rows('hhc_hero_carousel_slides_repeater')): the_row();
		        // display a sub field value
		        // the_sub_field('sub_field_name');
		        $image = get_sub_field('carousel_image');
		        // dump($image);
		        $align_style = get_sub_field('carousel_content_alignment_style');
		        // dump($align_style);
		    	?>

				<div class="special-container photo flexinam <?php echo $align_style; ?>" style="background-image: url(<?php echo $image['sizes']['voucher_background'] ?>);">
					<div class="content">
						<h3><?php the_sub_field('carousel_heading'); ?></h3>
						<h4><?php the_sub_field('carousel_content'); ?></h4>
						<div>
							<?php
							$button = get_sub_field('carousel_button');
							// dump($button);
							if($button['target']=="_blank"){
								$target = ' target="_blank"';
							}else{
								$target = '';
							}
							?>
							<a class="button <?php the_sub_field('button_hover_style'); ?>" href="<?php echo $button['url']; ?>" <?php echo $target; ?>>
								<?php echo $button['title']; ?>
							</a>
						</div>
					</div>
				</div>
		        <?php
		    endwhile;
		endif;
		?>
	</div>
</section>
<!-- 2 SECTION END-->

<!-- 3 SECTION START: for overlay-->
<section class="overlay">
</section>
<!-- 3 SECTION START: for overlay-->