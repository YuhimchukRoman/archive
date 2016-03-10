<?php
/**
 * Footer
 * Add or remove footer class navbar-fixed-bottom for sticky/nonsticky footer
 */

?>
<footer class="footer navbar-default row-fluid">
	<div class="container">
	<p>
		<?php if(get_field('foter_text')) :
		the_field('foter_text');
		endif;?>
	</p>
	<?php if(get_field('footer_link')) : ?>
	<a href="<?php the_field('footer_link');?>">
    <?php if(get_field('footer_link_text')) :
    the_field('footer_link_text');
    endif;?>
	<img src="<?php echo get_template_directory_uri();?>/images/arrow.png" alt="">
	</a>
	<?php endif;?>
	</div><!-- END of .container -->
</footer><!-- END of  Footer -->

<?php // Enables offcanvas menu if its active
	mobile_offcanvas_after() ?>

<?php wp_footer(); ?>
</body>
</html>