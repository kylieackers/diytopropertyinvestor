<?php
/**
 * The template for displaying a single page.
 */

get_header(); 
the_post();
?>

	<div class="content-area">
		<main class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="page-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<h2 class="page-subtitle"><?php the_field('sub-title'); ?></h2>
				</header>

				<div class="post-content">
				<?php if ( has_post_thumbnail() ){ ?>
					<div class="page-image"> 
						<?php the_post_thumbnail('medium'); ?> 
					</div>
				 <?php   } ?>

					<?php the_content(); ?>
				</div>

			</article>

		</main>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
