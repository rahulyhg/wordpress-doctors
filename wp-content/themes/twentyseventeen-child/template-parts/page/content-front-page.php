<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php
	$date1 = new DateTime();
	$date2 = new DateTime('07/25/2017');
	$currentTime = $date1->getTimestamp();
	$lotteryEnd = $date2->getTimestamp();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );

		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
				<div class="row frontpage-posts-section">
					<div class="col-12">
						<?php get_custom_posts (5, 'Happy Customers', 'Happy Customers Say:', 'happy-customers', true, true); ?>
					</div>
				</div>
			</div><!-- .entry-content -->


		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->

<script>
	var lotteryEnd = "<?=$lotteryEnd-$currentTime;?>"
	var clock = jQuery('#flipclock').FlipClock(parseInt(lotteryEnd), {
		clockFace: 'DailyCounter',
		countdown: true,
		showSeconds: false
	});
</script>
