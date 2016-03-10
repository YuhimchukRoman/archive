<?php
/**
 * Register Menus and Sidebars
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */

/**
 * Register Navigation Menus
 *
 */

register_nav_menus(array(
	'primary' => __( 'Primary Menu', 'Bootstrap' ),
   	 'footer-nav' => __( 'Footer Menu', 'Bootstrap' ),
));

/**
 * Enable Offcanvas Mobile Menu trough theme options
 *
 */

// Offcanvas START
function mobile_offcanvas_start() {
	if ( has_nav_menu( 'mobile-nav' ) ) {
		echo '<div class="site-wrapper" id="site-wrapper">';
		echo '<section class="off-canvas-wrap" id="off-canvas-wrap">';
		echo '<section class="off-canvas-menu" id="offcanvas-menu">';
		wp_nav_menu( array('menu' => 'mobile-nav', 'theme_location'    => 'mobile-nav', 'depth' => 2, 'container' => 'div', 'container_class' => 'navbar', 'container_id' => 'navbar-mobile', 'menu_class' => 'nav nav-pills nav-stacked', 'fallback_cb' => 'bootstrap_navwalker::fallback', 'walker' => new bootstrap_navwalker()) );
		echo '</section>';
	}
}
add_action( 'offcanvas_before', 'mobile_offcanvas_before' );

// Offcanvas END
function mobile_offcanvas_after() {
	if ( has_nav_menu( 'mobile-nav' ) ) {
		echo '</section>';
		echo '</div>';
		echo '<script>
		$(function(){
		// If window on load is smaller than 768px offcanvas menu is available
		if ($(window).width() < 768) {
			// Open offcanvas menu on swipe right
			$( window ).on("swiperight",function(){
			 	$(\'.site-wrapper\').addClass(\'move-right\');
			});
			// Close offcanvas menu on swipe left
			$( window ).on("swipeleft",function(){
			 	$( \'.site-wrapper\').removeClass( \'move-right\');
			});}
		});
		</script>';
	}
}
add_action( 'offcanvas_after', 'mobile_offcanvas_after' );


/**
 * Register Sidebars
 *
 */

	function bootstrap_widgets_init() {
	/* Sidebar Right */
		register_sidebar( array(
			'id' => 'bootstrap_sidebar_right',
			'name' => __( 'Sidebar Right' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
	}
	add_action( 'widgets_init', 'bootstrap_widgets_init' );
?>
