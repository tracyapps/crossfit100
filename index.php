<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cf100
 */

get_header(); ?>

	<div id="latestNewsContainer" class="container">
		<main id="main" class="site-main twoThirds" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'news' ); ?>

			<?php endwhile; ?>

			<?php cf100_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<aside class="oneThird darkOverlay">
			<?php get_sidebar(); ?>
		</aside>
	</div><!-- /container -->


<?php get_footer(); ?>
