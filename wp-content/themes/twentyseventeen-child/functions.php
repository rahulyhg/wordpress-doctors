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
	    wp_enqueue_script('paypal-checkout', 'https://www.paypalobjects.com/api/checkout.js', array(), $ver = null);
	    wp_enqueue_script('flipclock-min', get_stylesheet_directory_uri() . '/js/flipclock.min.js', array(), $ver = null);
	    wp_enqueue_script('child-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('flipclock-min'), $ver = null);
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_js' );

	function sidebar_posts ($postsNumber, $postsCategoryName) {
		?> <div class="sidebar-posts">
			<h2>Stories of Success:</h2>
			<?php 
				global $post;
				$args = array( 'posts_per_page' => $postsNumber, 'category_name' => $postsCategoryName );
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
	/*
		(int)$postsNumber
		(str)$postsCategoryName
		(str)$wrapper - class name of the posts container
		(str)$postsHeading - section heading
		(bool)$clickable - whether to include a links to the post page
	*/
	function get_custom_posts ($postsNumber, $postsCategoryName, $postsHeading, $wrapper, $clickable=true) {
		?> <?php if($postsHeading && $postsHeading !="") { echo "<h2>".$postsHeading."</h2>"; } ?>
			<div class="<?=$wrapper?> row custom-posts-wrapper">
		<?php	
			global $post;
			$args = array( 'posts_per_page' => $postsNumber, 'category_name' => $postsCategoryName );
			$lastposts = get_posts( $args );
			foreach ( $lastposts as $post ):
			setup_postdata( $post );
		?>
				<div class="custom-post-item-wrapper">
					<?php if($clickable): ?>
						<div class="custom-post-thumbnail">
							<a style="background-image: url(<?php the_post_thumbnail_url('medium_large'); ?>)" href="<?php the_permalink(); ?>"></a>
						</div>
						<div class="custom-post-content">
							<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							<p><?php the_content(); ?></p>
						</div>
					<?php else: ?>
						<div style="background-image: url(<?php the_post_thumbnail_url('medium_large'); ?>)" class="custom-post-thumbnail"></div>
						<div class="custom-post-content">
							<h6><span><?php the_title(); ?></span></h6>
							<p><?php the_content(); ?></p>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?> 
			</div>
			<?php wp_reset_postdata();
	}

