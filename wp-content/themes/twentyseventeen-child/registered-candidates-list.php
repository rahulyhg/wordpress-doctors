<?php
/**
 * Template Name: Registered candidates list
 * The template for a list of the registered candidates
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$table_name = $wpdb->prefix . "candidates";
$candidates = $wpdb->get_results ("
	SELECT `name`, `surname`, `email`, `status`, `registration_date`
	FROM $table_name 
	WHERE $table_name.`status` = 1
	ORDER BY `registration_date` DESC
");

$args = array( 'posts_per_page' => 5 );
$lastposts = get_posts( $args );

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section class="row">
				<div class="col-9">
					<?php if($candidates): ?>
					<table class="candidates-table">
						<tr>
						    <th>Full name</th>
							<th>Email</th>
							<th>Registration date</th>
						</tr>
						<?php foreach ($candidates as $candidate): ?>
							<tr>
								<td><?=$candidate->name ." ". $candidate->surname; ?></td>
								<td><?=$candidate->email; ?></td>
								<td><?=$candidate->registration_date; ?></td>
							</tr>					
						<?php endforeach; ?>
					</table>
					<?php else: ?>
						<p>Here will be the list of the registered candidates, when there are such.</p>
					<?php endif; ?>
				</div>
				<div class="col-3">
					<div class="sidebar-posts">
						<h2>Recent stories:</h2>
						<?php foreach ( $lastposts as $post ): setup_postdata( $post ); ?>
							<div class="sidebar-post-thumbnail">
								<a style="background-image: url(<?php the_post_thumbnail_url('medium_large'); ?>)" href="<?php the_permalink(); ?>"></a>
							</div>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php endforeach; 
						wp_reset_postdata(); ?>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->


<?php get_footer();