<?php
/**
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
		<main id="main" class="overlaybg <?php echo $page_bgoverlay; ?> site-main" role="main">
			<div class="container">
				<header class="entry-header">
					<h2 class="pageTitle"><?php the_title(); ?></h2>
				</header>
				<section class="content darkOverlay oneHalf">
					<?php the_content(); ?>
				</section>
				<?php endwhile; // end of the loop. ?>

				<?php get_template_part( 'content', 'the-trainers' ); ?>
			</div>
			
		</main><!--/main -->
	</div><!-- /page -->

<?php get_footer(); ?>
