<!-- 6 SECTION START: VOUCHERS-->
<?php
$image = get_field('hv_voucher_image');
// dump($image);
$button = get_field('hv_voucher_button');
// dump($button);
if ($button['target']=='_blank') {
	$target = ' target="_blank"';
}else{
	$target = '';
}
?>
<section id="coupons" class="voucher" style="background-image: url(<?php echo $image['sizes']['voucher_background'] ?>);">
	<div class="container flexinam">
		<div class="voucher-content">
			<h3><?php the_field('hv_voucher_heading'); ?></h3>
			<h4><?php the_field('hv_voucher_caps_title'); ?></h4>
			<a class='button dark-button' href="<?php echo $button['url']; ?>" <?php echo $target; ?>>
				<?php echo($button['title']); ?>
			</a>
		</div>
	</div>
</section>
<!-- 6 SECTION END: VOUCHERS-->