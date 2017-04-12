<?php
	// registering styles
	function my_theme_enqueue_styles() {
	    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	    // using style.css of the child theme
	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), $ver = null);
	    wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/bootstrap-grid.css', array(), $ver = null);
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

	// registering javascript files
	function my_theme_enqueue_js() {
	    wp_enqueue_script('child-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), $ver = null);
	    wp_enqueue_script('paypal-checkout', 'https://www.paypalobjects.com/api/checkout.js', array(), $ver = null);
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_js' );

	function sidebar_posts ($postsNumber) {
		?> <div class="sidebar-posts">
			<h2>Recent stories:</h2>
			<?php 
				global $post;
				$args = array( 'posts_per_page' => $postsNumber );
				$lastposts = get_posts( $args );
				foreach ( $lastposts as $post ):
				setup_postdata( $post );
			?>
				<div class="sidebar-post-thumbnail">
					<a style="background-image: url(<?php the_post_thumbnail_url('medium_large'); ?>)" href="<?php the_permalink(); ?>"></a>
				</div>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php endforeach; ?> 
			</div>
			<?php wp_reset_postdata();
	}