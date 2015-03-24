<?php
/**
 * @package cf100
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<header class="entry-header">
		<h2 class="postTitle"><?php the_title(); ?> </h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php cf100_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="darkOverlay">

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'cf100' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

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
	</div><!--/darkOverlay-->
</article><!-- #post-## -->