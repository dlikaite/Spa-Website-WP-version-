<!-- 5 SECTION START: INTRO TO SERVICES-->
<section id="our_services" class="intro-to-service">
	<div class="container flexinam">
		<div class="antraste">
			<h4><?php the_field('hits_title'); ?></h4>
		</div>
		<div>
			<?php
			$button = get_field('hits_button');
			// dump($button);
			if ($button["target"]== '_blank') {
				$target = ' target="_blank"';
			} else {
				$target ='';
			}
			?>
			<a class="button" href="<?php echo $button["url"]; ?>" <?php echo $target; ?>>
				<?php echo $button["title"]; ?>
			</a>
		</div>
	</div>
</section>
<!-- 5 SECTION END: INTRO TO SERVICES-->