<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

		</div><!-- .inner-wrap -->
	</div><!-- #content -->

	<section id="optin" class="sub-footer">
	<div class="sub">
  		<form action="http://diytopropertyinvestor.us8.list-manage1.com/subscribe/post?u=c829f4976002b84ba6d60e297&amp;id=b36723a05f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<label for="mce-EMAIL" class="email-title">Get exclusive updates and information straight to your inbox!</label>
		<input type="email"  value="Email*" name="EMAIL" class="email" id="mce-EMAIL" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
		<input type="submit" value="Subscribe!" name="subscribe" id="mc-embedded-subscribe" class="button">
		<div class="indicates-required"><span class="asterisk">*</span> required</div></div>
		</form>
	</div>
	</section>




	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'radiate_credits' ); ?>
			<?php _e( 'Proudly  powered by ', 'radiate' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php _e( 'WordPress', 'radiate' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'radiate' ), 'Radiate', '<a href="'.esc_url('http://themegrill.com/').'" rel="designer">ThemeGrill</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
