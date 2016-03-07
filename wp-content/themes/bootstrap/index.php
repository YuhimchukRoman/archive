<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */
get_header();?>

<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-9">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?><!-- BEGIN of Post -->

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h3>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'bootstrap'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h3>
						<?php if (is_sticky()) : ?>
							<span class="right radius secondary label"><?php _e('Sticky', 'bootstrap'); ?></span>
						<?php endif; ?>
						<h6>Written by <?php the_author_link(); ?> on <?php the_time(get_option('date_format')); ?></h6>
						<?php if (has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
								<?php the_post_thumbnail(); ?>
							</a>
						<?php endif; ?>
						<?php the_excerpt(); ?>
						<!-- Use wp_trim_words() instead if you need specific number of words -->
					</article>
				<?php endwhile; ?><!-- END of Post -->

			<?php endif; ?>

			<div class="pagination">
				<?php
				  if ( function_exists('bootstrap_pagination') )
				    bootstrap_pagination();
				?>
			</div><!-- END of .pagination -->

		</div><!-- END of cols -->

			<?php get_sidebar('right'); ?>

	</div><!-- END of .row-->
</div><!-- END of .container-fluid-->

<?php get_footer(); ?>