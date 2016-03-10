<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 col-lg-9 col-sm-12">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of Post -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="page_title"><?php the_title(); ?></h1>
						<h6><?php _e('Written by');?> <?php the_author_link(); ?> on <?php the_time(get_option('date_format')); ?></h6>
						<?php if ( has_post_thumbnail()) : ?>
							<div title="<?php the_title_attribute(); ?>" class="th">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
						<h6><?php _e('Posted Under:', 'bootstrap' );?> <?php the_category(', '); ?></h6>
						<?php comments_template(); ?>
					</article>
				<?php endwhile; ?><!-- END of Post -->
			<?php endif; ?>
		</div><!-- END of .columns -->
			<?php get_sidebar('right'); ?>
	</div><!-- END of .row-->
</div>
<?php get_footer(); ?>