<!-- 4 SECTION START: ABOUT US-->
<section id="us" class="about-us">
	<div class="container flexinam">
		<div class="content-about-us">
			<h1><?php the_field('hau_about_us_welcome'); ?></h1>
			<h2><?php the_field('hau_about_us_heading'); ?></h2>
			<div><?php the_field('hau_about_us_paragraph'); ?></div>
			<div>
				<?php
				$button = get_field('hau_button');
				// dump($button);
				if($button['target']=="_blank"){
					$target = ' target="_blank"';
				}else{
					$target = '';
				}
				?>
				<a class="button" href="<?php echo $button['url']; ?>" <?php echo $target; ?>>
					<?php echo $button["title"]; ?>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- 4 SECTION END: ABOUT US-->