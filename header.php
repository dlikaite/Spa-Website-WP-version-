<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width,initial-scale=1"> 
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body>
		<!-- START: button-to-top -->
		<button class="myBtn" title="Go to top">
			<i class="fa fa-arrow-up" aria-hidden="true"></i>
		</button>
		<!-- END: button-to-top -->

		<!-- HEADER START-->
		<header class="float-navigation"> <!-- zalias --> 
			<div class="container flexinam">
				<div class="logo">
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
				<nav id="myTopnav" class="meniu flexinam">
					<div>
						<a href="javascript:void(0);" class="icon_burger"><i class="fa fa-bars" aria-hidden="true"></i></a>
					</div>
					<?php
					$args = [
						'menu_class' => 'flexinam topnav',
						'container' => false,
						'theme_location' => 'primary-navigation'
					];

					wp_nav_menu($args);
					?>
				</nav>
			</div>
		</header>
		<!-- HEADER END --> 