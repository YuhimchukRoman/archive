<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */

get_header(); ?>

<div class="container">
	<div class="row">

		<section class="col-sm-9 col-md-9 col-xs-12">
			<h5>404: Page Not Found</h5>
			<h1>Keep on looking...</h1> <!--Change inner text-->
			<p>Double check the URL or head back to the <a href="<?php bloginfo('url'); ?>">HOMEPAGE</a></p><!--Change inner text-->
		</section>

		<?php get_sidebar('right'); ?>

	</div><!-- END of .row-->
</div><!-- END of .container-fluid-->
<?php get_footer(); ?>