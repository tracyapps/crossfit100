<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cf100
 */

get_header(); ?>
		
	<div id="latestNewsContainer" class="container">
		
		<?php if ( have_posts() ) : ?>

			<h2 class="pageTitle">
					<?php
						if ( is_category() ) :
							echo 'Posts in category: ';
							single_cat_title();

						elseif ( is_tag() ) :
							echo 'Posts tagged: ';
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'cf100' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'cf100' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'cf100' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cf100' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'cf100' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'cf100' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'cf100' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'cf100');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'cf100');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'cf100' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'cf100' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'cf100' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'cf100' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'cf100' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'cf100' );

						else :
							_e( 'Archives', 'cf100' );

						endif;
					?>
				</h2>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
		<main class="twoThirds">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php cf100_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</main><!--/twoThirds-->
		<aside class="oneThird darkOverlay">
			<?php get_sidebar(); ?>
		</aside>
	</div><!--/container-->

<?php get_footer(); ?>
