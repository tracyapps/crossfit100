<?php
/**
 * @package cf100
 */
?>

<section class="content tabbthat ui-tabs clearfix" id="successTabs">
					<?php query_posts('post_type=successstories&showposts=-1&orderby=date&order=DESC'); ?>
					<ul class="tabs">
						<?php while (have_posts()) : the_post(); ?>
							<li role="tab"><a data-href="#<?php echo the_slug(); ?>">
								<?php the_title(); ?>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
			<?php wp_reset_query(); ?>
					<?php query_posts('post_type=successstories&showposts=-1&orderby=date&order=DESC'); ?>
					<div class="tabcontents darkOverlay">
						<?php while (have_posts()) : the_post(); ?>
						<div id="<?php echo the_slug(); ?>">
							<h3><?php the_title(); ?></h3>
							<div class="oneHalf">
								<?php the_content(); ?>
							</div>
							<div class="oneHalf">
								<div class="caption oneHalf">
								<?php $key = 'ssphoto1'; $themeta = get_post_meta($post->ID, $key, TRUE); if($themeta != '') {
									$theimageurl = wp_get_attachment_image_src( $themeta, 'success-story-thumbnail' );
									echo '<img src="';
									echo $theimageurl[0];
									echo '">';
									} ?>
									Before
								</div><!--/caption photo 1-->
								<div class="caption oneHalf">
								<?php $key = 'ssphoto2'; $themeta = get_post_meta($post->ID, $key, TRUE); if($themeta != '') {
									$theimageurl = wp_get_attachment_image_src( $themeta, 'success-story-thumbnail' );
									echo '<img src="';
									echo $theimageurl[0];
									echo '">';
									} ?>
									Now
								</div><!--/caption photo 2-->
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</section>
