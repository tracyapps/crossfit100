<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
			<div class="container">
				<header class="entry-header">
					<h2 class="pageTitle"><?php the_title(); ?></h2>
				</header>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_query(); /* reset query to grab child pages */ ?>
				<div class="galleryChildPages container ">
					<h5>Choose a gallery below:</h5>
					<?php
					// Set up the arguments for retrieving the pages
					$args = array(
						'post_type' => 'page',
						'numberposts' => -1,
						'post_status' => null,
						// $post->ID gets the ID of the current page
						'post_parent' => $post->ID,
						'order' => ASC,
						'orderby' => 'menu_order'
					);
					$subpages = get_posts($args);
						// Just another WordPress Loop
						foreach($subpages as $post) : 
						setup_postdata($post);
					?>
					<div class="childpage darkOverlay">
						<?php
							if ( has_post_thumbnail( $post->ID ) &&
							( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) )  ) :
						  ?>
							<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail($id, 'child-page-thumbnail', array('class' => 'thumbnailImage')); ?></a>
						<?php  else : ?>
							<a href="<?php echo get_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/photogallerythumbnaildefault.jpg" class="thumbnailImage" /></a>
						<?php endif ?>
						<h6 class="galleryTitle"><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?>&nbsp;&raquo;</a></h6>
					</div><!--/.childpage-->
					<?php endforeach; ?>
				</div><!--/.galleryChildPages-->
			<?php wp_reset_query(); ?>
		</main><!--/main -->
	</div><!-- /page -->

<?php get_footer(); ?>
