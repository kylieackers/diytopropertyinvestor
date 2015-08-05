<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'radiate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="social2">
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="kylieackers" data-size="large">Tweet</a>
		<script>
			!function(d,s,id){
				var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
				if(!d.getElementById(id)){
					js=d.createElement(s);
					js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
					fjs.parentNode.insertBefore(js,fjs);
				}}
				(document, 'script', 'twitter-wjs');
		</script>
	<?php edit_post_link( __( 'Edit', 'radiate' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	</div><!-- .social2 -->
</article><!-- #post-## -->
