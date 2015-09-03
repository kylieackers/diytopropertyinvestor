<?php
/**
 * The template file to show the front page display.
 */
	get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts()) : while ( have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="blog-header">
						<?php if ( has_post_thumbnail() ){ ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="excerpt-image">
									<?php the_post_thumbnail('medium'); ?>
								</div>
							</a>
						<?php	} ?>

						<h1 class="blog-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						<h2 class="blog-subtitle"><?php the_field('sub-title'); ?></h2>
						</h1>
					</header>

					<div class="excerpt-content">
						<?php the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile;
			paging_nav(); 

			else:
				get_template_part('no-posts');
			endif;
			?>
		</main>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
