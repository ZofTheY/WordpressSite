<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<div class="body-container">
	<?php // if (is_single(44)) { ?>
	<?php // } ?>
	<!-- Header -->
		<header class="header-container">
			<nav class="navigation-wrapper">
				<ul class="navigation clearfix">
					<div class="logo-wrapper">
					</div>
					<li>Home</li>
					<li>Blog</li>
					<li>Contact</li>
					<li>About us</li>
				</ul>
			</nav>
			<!--<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>-->
			<h5><?php bloginfo('description'); ?></h5>
			<?php 
			$args = array('theme_location' => 'primary');
			wp_nav_menu($args); 
			?>
		</header>
	<!------------>