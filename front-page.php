<?php
/**
 * the homepage/front page
 *
 * @package cf100
 */

get_header(); ?>

	<div id="home" class="fullheight clearfix">
		<div class="banner">
			<ul class="fullheightss">
			<?php query_posts('post_type=homepageslides&showposts=6&orderby=date&order=ASC'); ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if (has_post_thumbnail( $post->ID ) ){ 
						 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						 <li class="slide" style="background-image: url('<?php echo $image[0]; ?>');">
					<?php } else { ?> 
						<li class="slide" style="background-image: url('/wp-content/themes/cf100/images/black_paper.png');">
					<?php } ?>
							<span class="slidetextBG animated"><h1><?php the_title(); ?></h1></span>
						</li>
				<?php endwhile; ?>
			 </ul>
		</div><!--/banner-->
		<div class="homeWidgets">
			<div class="oneThird darkOverlay">
				<?php dynamic_sidebar( 'Homepage: Left column' ); ?>
			</div>
			<div class="oneThird darkOverlay">
				<?php dynamic_sidebar( 'Homepage: Center column' ); ?>
			</div>
			<div class="oneThird darkOverlay">
				<?php dynamic_sidebar( 'Homepage: Right column' ); ?>
			</div>
		</div>
	</div><!--/home-->
<?php wp_reset_query(); ?>
	<div class="break clearfix">
		<div class="container testimonial widget">
			<aside class="oneCol">
				<blockquote>
					<?php dynamic_sidebar( 'Break 1: one column testimonial' ); ?>
				</blockquote>
			</aside>
		</div>
	</div>
	<?php
		/* ----------------------------------------------------- success stories */
		$page_id = 38;		// success stories page
		$page_data = get_page( $page_id );
  		$page_slug = $page->post_name;
  		$page_bgoverlay = get_post_meta($page_id, 'backgroundoverlay', true);
  		$page_bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
	?>
	<div id="success-stories" class="fullheight clearfix"
		<?php if (has_post_thumbnail( $page_id ) ){ ?>
			style="background-image: url('<?php echo $page_bgimage[0]; ?>');"
		<?php } ?>
	>
		<div class="overlaybg <?php echo $page_bgoverlay; ?> fullheight">
			<div class="container">
				<h2 class="pageTitle"><?php echo $page_data->post_title; ?></h2>
				<?php get_template_part( 'content', 'success-stories' ); ?>
			</div>
			<br clear="all" />
		</div><!--/.overlaybg-->
	</div><!--/success-stories-->
<?php wp_reset_query(); ?>
	<div class="break clearfix">
		<div class="container social widget">
			<aside class="twoCol">
				<div class="twoThirds">
					<div class="instagram"><h2 class="thin"><img src="<?php bloginfo('template_directory'); ?>/images/icon-instagram.png" class="icon"> #crossfit100</h2></div>
				</div>
				<div class="oneThird">
					<?php dynamic_sidebar( 'Break 2: right side' ); ?>
				</div>
				<br clear="all" />
			</aside>
			
		</div>
	</div><!--/break-->
	<?php 
		/* ----------------------------------------------------- about */
		$page_id = 15;		// about page
		$page_data = get_page( $page_id );
  		$page_slug = $page->post_name;
  		$page_bgoverlay = get_post_meta($page_id, 'backgroundoverlay', true);
  		$page_bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
	?>
	<div id="about" class="fullheight clearfix"
		<?php if (has_post_thumbnail( $page_id ) ){ ?>
			style="background-image: url('<?php echo $page_bgimage[0]; ?>');"
		<?php } ?>
	>
		<div class="overlaybg <?php echo $page_bgoverlay; ?> fullheight">
			<div class="container">
				<h2 class="pageTitle"><?php echo $page_data->post_title; ?></h2><br />
				<section class="content darkOverlay oneHalf">
					<?php echo apply_filters('the_content', $page_data->post_content); ?>
				</section>
				<?php get_template_part( 'content', 'the-trainers' ); ?>
			</div>
			<br clear="all" />
		</div><!--/.overlaybg-->
	</div><!--/about-->
<?php wp_reset_query(); ?>
	<div class="break">
		<div class="container testimonial widget oneCol">
			<aside class="oneCol">
				<blockquote>
					<?php dynamic_sidebar( 'Break 3: one column testimonial' ); ?>
				</blockquote>
			</aside>
		</div>
	</div><!--/break-->
	<?php 
		/* ----------------------------------------------------- membership rates */
		$page_id = 17;		// membership rates
		$page_data = get_page( $page_id );
  		$page_slug = $page->post_name;
  		$page_bgoverlay = get_post_meta($page_id, 'backgroundoverlay', true);
  		$page_bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
	?>
	<div id="membership-rates" class="fullheight clearfix" <?php if (has_post_thumbnail( $page_id ) ){ ?> style="background-image: url('<?php echo $page_bgimage[0]; ?>');"	<?php } ?>>
		<div class="overlaybg <?php echo $page_bgoverlay; ?> fullheight">
			<div class="container">
				<h2 class="pageTitle"><?php echo $page_data->post_title; ?></h2>
				<section class="content darkOverlay">
					<?php echo apply_filters('the_content', $page_data->post_content); ?>
				</section>
			</div>
		</div><!--/.overlaybg-->
	</div><!--/membership-rates-->
	<div class="break darkbg clearfix">
		<div class="container getstarted">
			<section class="oneCol">
				<?php dynamic_sidebar( 'Break 4: one column call to action' ); ?>
			</section>
		</div>
	</div><!--/break-->
	<?php 
		/* ----------------------------------------------------- latest news */
		?>
	<div class="break">
		<div id="latest-news" class="container latestnews">
			<h2 class="pageTitle">Latest news</h2><br />
				<section id="masonry" class="js-masonry">
				<?php query_posts('post_type=post&showposts=20&orderby=date&order=DEC'); ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content') ?>
					<?php endwhile; ?>
				</section>
		</div>
		<br clear="all" />
	</div><!--/break-->
<?php wp_reset_query(); ?>
	<?php 
		/* ----------------------------------------------------- contact */
		$page_id = 42;		// contact
		$page_data = get_page( $page_id );
  		$page_slug = $page->post_name;
  		$page_bgoverlay = get_post_meta($page_id, 'backgroundoverlay', true);
  		$page_bgimage = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
	?>
	<div id="contact" class="fullheight"
		<?php if (has_post_thumbnail( $page_id ) ){ ?>
			style="background-image: url('<?php echo $page_bgimage[0]; ?>');"
		<?php } ?>
	>
		<div class="overlaybg <?php echo $page_bgoverlay; ?> fullheight">
			<div class="container">
				<h2 class="pageTitle"><?php echo $page_data->post_title; ?></h2><br />
				<section class="content darkOverlay oneHalf">
					<?php echo apply_filters('the_content', $page_data->post_content); ?>
				</section>
				<section class="content darkOverlay oneHalf">
					<?php dynamic_sidebar( 'Sidebar: Contact us page' ); ?>
				</section>
			</div>
			<br clear="all" />
		</div><!--/.overlaybg-->
	</div><!--/contact-->


<?php get_footer(); ?>
