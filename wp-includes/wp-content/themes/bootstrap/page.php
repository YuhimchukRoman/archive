<?php
/**
 * Page
 */
get_header(); ?>
<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of Post -->
			<article <?php post_class(); ?>>
				<h1 class="page_title"><?php the_title(); ?></h1>
				<?php if ( has_post_thumbnail()) : ?>
					<div title="<?php the_title_attribute(); ?>" class="th">
						<?php the_post_thumbnail(); ?>
					</div><!-- END of .th -->
				<?php endif; ?>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?><!-- END of Post -->
	<?php endif; ?>
	</div><!-- END of .columns -->
		<?php get_sidebar('right'); ?>
</div><!-- END of .row-->
</div>
<?php get_footer(); ?>