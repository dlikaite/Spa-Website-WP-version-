		<!-- 7 SECTION START: FOOTER -->
		<footer id="contact_us" class="end-footer">
			<div class="container">
				<div class="footer-content">
					<div class="logo2">
						<a href="<?php echo site_url(); ?>">
							<?php
							if(get_field('op_logo_type', 'option')):
								// image logo
								$image = get_field('op_logo_image', 'option');
								// dump($image);
								?>
								<img src="<?php echo $image['sizes']['medium'] ?>" alt="<?php bloginfo('name'); ?>">
								<?php
							else:
								// text logo
								the_field('op_logo_text', 'option');
							endif;
							?>
						</a>
					</div>
					<div class="address">
						<h4><?php the_field('osf_address', 'option'); ?></h4>
						<a href="mailto:info@spanamai.lt">
							<?php the_field('osf_email', 'option'); ?>
						</a>
						<h4><?php the_field('osf_telephone', 'option'); ?></h4>
					</div>
					<div class="icon-social">
						<ul class="flexinam">
							<?php
							if (have_rows('osf_social_meniu_repeater', 'option')):
							    while (have_rows('osf_social_meniu_repeater', 'option')): the_row();
							        // the_sub_field('sub_field_name');
									$link = get_sub_field('link');
									// dump($link);
									if($link['target']=="_blank"){
										$target = ' target="_blank"';
									}else{
										$target = '';
									}							        
							        $icon = get_sub_field('icon');
							        // dump($icon);
							        ?>
									<li class="margin">
										<a href="<?php echo $link['url']; ?>" <?php echo $target; ?>>
											<?php echo $icon; ?>
										</a>
									</li>        
							        <?php
							    endwhile;
							endif;
							?>
						</ul>
					</div>
					<div class="rights">
						<div><?php the_field('osf_rights', 'option'); ?></div>
					</div>
				</div>
			</div>
		</footer>
		<!-- 7 SECTION END: FOOTER -->
		<?php wp_footer(); ?>
	</body>
</html>