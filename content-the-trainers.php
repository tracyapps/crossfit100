<?php
/**
 * @package cf100
 */
?>

<section class="content tabbthat oneHalf" id="trainersTabs">
					<?php query_posts('post_type=thetrainers&showposts=-1&orderby=date&order=ASC'); ?>
					<ul class="tabs">
						<h3>Meet The Trainers</h3>
						<?php while (have_posts()) : the_post(); ?>
							<li><a data-href="#<?php echo the_slug(); ?>">
								<?php the_title(); ?>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
			<?php wp_reset_query(); ?>
					<?php query_posts('post_type=thetrainers&showposts=-1&orderby=date&order=ASC'); ?>
					<div class="tabcontents darkOverlay theTrainers">
						<?php while (have_posts()) : the_post(); ?>
						<div id="<?php echo the_slug(); ?>">
							<h3><?php the_title(); ?></h3>
							<?php $key = 'trainertitle'; $themeta = get_post_meta($post->ID, $key, TRUE); if($themeta != '') {
									echo '<h6>';
									echo get_post_meta($post->ID, 'trainertitle', true);
									echo '</h6>';
									} ?>
							<?php $key = 'trainercerts'; $themeta = get_post_meta($post->ID, $key, TRUE); if($themeta != '') {
									echo '<h6 class="certs"><strong>Certifications:</strong> ';
									echo get_post_meta($post->ID, 'trainercerts', true);
									echo '</h6>';
									} ?>
							<?php the_content(); ?>
						</div>
						<?php endwhile; ?>
					</div>
				</section>


