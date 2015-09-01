<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
	<div class="sidebar-area" role="complementary">

		<aside class="menu-secondary">
			<div class="menu-item">		
				<p class="menu-title">Investments</p>
				<div class="menu-list">
					<?php wp_nav_menu( array('theme_location' => 'investor')); ?>
				</div>
			<div>

			<div class="menu-item">		
				<p class="menu-title">DIY Projects</p>
				<div class="menu-list">
					<?php wp_nav_menu( array('theme_location' => 'diy')); ?>
				</div>
			<div>

			<div class="menu-item">		
				<p class="menu-title" href="">Tookit</p>
				<div class="menu-list">
					<?php wp_nav_menu( array('theme_location' => 'toolkit')); ?>
				</div>
			<div>
		</aside>

		<aside class="side-subscribe">
			<?php get_template_part('sidebar-subscribe'); ?>
		</aside>

		<aside class="side-calculator">
			<?php get_template_part('sidebar-calculator'); ?>
		</aside>
	</div>
