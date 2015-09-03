<?php
/**
 * All functions needed for the site
 */

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array( 'primary' => 'Primary Navigation',
				   'diy' => 'DIY Project Navigation',
				   'investor' => 'Investor Properties',
				   'toolkit' => 'Investor Toolkit'));

	function amas_scripts() {
		// Load the main stylesheet.
		wp_enqueue_style( 'amas-style', get_template_directory_uri(). '/assets/css/style.css' );

		// Load javascript 
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'amas_menu', get_template_directory_uri(). '/assets/js/script.js' );
		wp_enqueue_script( 'calculator', get_template_directory_uri(). '/assets/js/calculator.js' );
	}
	add_action( 'wp_enqueue_scripts', 'amas_scripts' );

	function remove_admin_bar() {
		if (!current_user_can('adminstrator') && !is_admin()) {
			show_admin_bar(false);
		}
	}
	add_action('after_setup_theme','remove_admin_bar');

 	// Add a nice wrapper function for TimThumb
        if ( !function_exists('tt') ) {
                /* Return the path to timthumb */
                function tt() {
                        return home_url('wp-content/timthumb/timthumb.php');
                }
        }

	// Small function for pagination when there are more postsA
	if ( !function_exists( 'paging_nav' ) ) :
		function paging_nav() {
        		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
                		return;
        		}
        		?>
        		<nav class="navigation paging-navigation" role="navigation">
                		<div class="nav-links">

                        	<?php if ( get_next_posts_link() ) : ?>
                        		<div class="nav-old">
						<?php next_posts_link( __( 'Older posts <span class="meta-nav">&rarr;</span>' )); ?>
					</div>
                        	<?php endif; ?>

                        	<?php if ( get_previous_posts_link() ) : ?>
                        		<div class="nav-new">
						<?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts')); ?>
					</div>
                        	<?php endif; ?>

                		</div><!-- .nav-links -->
        		</nav><!-- .navigation -->
        <?php
}
endif;






        if ( !function_exists( 'timthumb' ) ) {
                function timthumb( $src, $w = 500, $h = 500, $zc = 1, $s = 0, $f = 0 ) {
                        global $current_blog;

                        // Never sharpen PNG files.
                        if ( $f === 'png' ) {
                                $s = 0;
                        }

                        if ( is_multisite() && $current_blog->blog_id != BLOG_ID_CURRENT_SITE ) {
                                $src = preg_replace( "#/files/#", "/wp-content/blogs.dir/" . $current_blog->blog_id . "/files/", $src, 1 );
                        }

                        return tt() . '?' . http_build_query( compact( 'src', 'w', 'h', 'zc', 's', 'f' ) );
                }
        }


?>
