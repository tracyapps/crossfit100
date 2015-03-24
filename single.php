<?php
/**
 * The Template for displaying all single posts.
 *
 * @package cf100
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div id="page" class="fullheight insidepage clearfix"
	<?php if (has_post_thumbnail( $id, 'full' ) ){
		$page_bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		style="background-image: url('<?php echo $page_bgimage[0]; ?>');"
	<?php } ?>
	>
	<?php $page_bgoverlay = get_post_meta($post->ID, 'backgroundoverlay', true); ?>
	<main id="main" class="overlaybg <?php echo $page_bgoverlay; ?> site-main fullheight" role="main">

			<?php get_template_part( 'content', 'single' ); ?>

		<div class="container darkOverlay">
			<?php cf100_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
		</div>
		<?php endwhile; // end of the loop. ?>

	</main><!--/main -->
</div><!-- /page -->
<?php get_footer(); ?>