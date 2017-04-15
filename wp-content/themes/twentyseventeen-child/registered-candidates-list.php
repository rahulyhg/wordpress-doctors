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
	FROM 	$table_name 
	WHERE 	$table_name.`status` = 1
	AND		$table_name.`deleted` = 0
	ORDER BY `registration_date` DESC
");

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
					<?php sidebar_posts (5); ?>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->


<?php get_footer();
