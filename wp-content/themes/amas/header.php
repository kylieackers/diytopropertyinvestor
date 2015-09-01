<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="<?php bloginfo('description') ?>">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/favicon.ico' ?>">

	<?php wp_head(); ?>
</head>

<body >
<div class="hfeed site">
	<div class="site-content">

	<nav class="site-nav" id="site-nav">

		<?php get_template_part('logo'); ?>

		<div class="menu-nav" id="menu-nav">
			<?php wp_nav_menu( array('theme_location' => 'primary')); ?>
		</div>

	</nav>
