<?php
/**
 * @package cf100
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<header class="entry-header">
		<h2 class="pageTitle"><?php the_title(); ?></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php cf100_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
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

	<div class="darkOverlay">
	
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'cf100' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'cf100' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	
		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'cf100' ) );
					if ( $categories_list && cf100_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'cf100' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
	
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'cf100' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'cf100' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>
	
			<?php if ( ! post_password_required() && (!is_page() ) && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'cf100' ), __( '1 Comment', 'cf100' ), __( '% Comments', 'cf100' ) ); ?></span>
			<?php endif; ?>
	
			<?php edit_post_link( __( 'Edit', 'cf100' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div><!--/container-->
</article><!-- #post-## -->
