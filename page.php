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

	
					<?php get_template_part( 'content', 'page' ); ?>
	
	
				<?php endwhile; // end of the loop. ?>
			
			<div class="container">
				<?php if ( '284' == $post->post_parent ) { //child page of the gallery
					if(!$post->post_parent){
					// will display the subpages of this top level page
						$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
						}else{
						// diplays only the subpages of parent level
						//$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
						
						if($post->ancestors) {
							// now you can get the the top ID of this page
							// wp is putting the ids DESC, thats why the top level ID is the last one
							$ancestors = end($post->ancestors);
							$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
							// you will always get the whole subpages list
						}
					} ?>
						
						<ul class="galleryList">
							<h4 class="thin">View Gallery: </h4>
							<?php echo $children; ?>
						</ul>
				<?php } //end if child page of the gallery ?>
			</div>
			
		</main><!--/main -->
	</div><!-- /page -->

<?php get_footer(); ?>
