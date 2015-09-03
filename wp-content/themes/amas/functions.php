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

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
		}
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


if ( ! function_exists( 'display_comments' ) ) :
function display_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
                // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p>
			<?php _e( 'Pingback:'); ?> <?php comment_author_link(); ?> 
		   	<?php edit_comment_link( __( '(Edit)' ), '<span class="edit-link">', '</span>' ); ?>
		</p>
        <?php
                break;
                default :
                // Proceed with normal comments.
                global $post;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <header class="comment-meta comment-author vcard">
                                <?php
                                        echo get_avatar( $comment, 74 );
                                        printf( '<div class="comment-author-link">%1$s%2$s</div>',
                                                get_comment_author_link(),
                                                // If current post author is also comment author, make it known visually.
                                                ( $comment->user_id === $post->post_author ) ? '<span>' . __( ' - Post author' ) . '</span>' : ''
                                        );
                                        printf( '<div class="comment-date-time">%1$s</div>',
                                                sprintf( __( '%1$s at %2$s', 'radiate' ), get_comment_date(), get_comment_time() )
                                        );
                                        edit_comment_link();
                                ?>
                        </header><!-- .comment-meta -->
                       <?php if ( '0' == $comment->comment_approved ) : ?>
                                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                        <?php endif; ?>

                        <section class="comment-content comment">
                                <?php comment_text(); ?>
                                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </section><!-- .comment-content -->

                </article><!-- #comment-## -->
        <?php
                break;
        endswitch; // end comment_type check
}
endif; // ends check for display_comments()




?>
