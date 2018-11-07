<!-- 7 SECTION START: NEWS -->
<section id="our_news" class="news">
	<div class="container">
		<div class="intro">
			<h5><?php the_field('hn_homepage_heading'); ?></h5>
		</div>
		<div class="owl-carousel karusele2 owl-theme">
			<?php
			$args = [
				'cat' => get_field('hn_post_category'),
				'posts_per_page' => get_field('hn_limit')
			];

			$news = new WP_Query($args);
			// dump($news);

			// $thumb_id = get_post_thumbnail_id(get_the_ID());
			// $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			// // dump($alt);
			// if(count($alt)) echo $alt;

			if ($news->have_posts()):
				while ($news->have_posts()):
					$news->the_post();
					?>
					<div class="one-news-column">
						<div class="top-column">
							<figure>
								<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php echo $alt; ?>"> <!-- kaip cia su alt?????? -->
								<div class="top-right">
									<?php echo get_the_category_list(",") ?>
								</div>
							</figure>
						</div>
						<div class="bottom-column">
							<header>
								<h6><?php the_title(); ?></h6>
							</header>
							<div class="date-published">
								<h6 class="published"><?php echo get_the_date('F j, Y'); ?></h6>
							</div>
							<div class="paragraph">
								<p>
									<?php the_excerpt(); ?>
								</p>
							</div>
							<footer>
								<a href="<?php the_permalink(); ?>"><?php _e('read more', 'vcs-starter') ?></a>
							</footer>
						</div>
					</div>					
					<?php
				endwhile; // end while
			endif; // end if
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<!-- 7 SECTION END: NEWS -->