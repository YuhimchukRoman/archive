<?php
/**
 * Footer
 */
?>

<footer class="footer">
	<div class="row">
		<div class="large-12 medium-12 small-12 columns">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'inline-list','fallback_cb' => 'foundation_page_menu')); ?>
		</div><!-- END of .columns -->
	</div><!-- END of .row -->
</footer><!-- END of  Footer -->

<?php wp_footer(); ?>
</body>
</html>