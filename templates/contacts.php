<?php

/* Template Name: Contact Us */

get_header();

?>

<!-- Start Point -->
<?php
if (have_posts()):
	while (have_posts()):
		the_post();
		?>
		<section class="reservation">
			<div class="container flexinam">
				<div class="content">
					<div>
						<h3><?php the_field('cu_contact_us_intro'); ?></h3>
					</div>
					<div>
						<h4><?php the_field('cu_contact_us_heading'); ?></h4>
					</div>
					<div class="contact-form">
						<?php echo do_shortcode(get_field('cu_contact_form_shortcode')); ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	endwhile; // end while
endif;  // end if
?>
<?php get_footer(); ?>