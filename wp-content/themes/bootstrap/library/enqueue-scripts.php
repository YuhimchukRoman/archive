<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */

if ( ! function_exists( 'bootstrap_scripts' ) ) :
	function bootstrap_scripts() {
	//Run Sick slider on HOME page
	include_once(TEMPLATEPATH . '/inc/home-slider.php');

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/css/style.css', array(), '0.0.1', 'all' );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '0.0.1', true );

	// Plugins
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true );
	wp_enqueue_script( 'jquery.fancybox.pack', get_template_directory_uri() . '/js/plugins/jquery.fancybox.pack.js', null, null, true );
	//    wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', null, null, true );

	wp_enqueue_script('charts', get_template_directory_uri() . '/js/chart.js',array('jquery'));
	wp_enqueue_script('waypoints', 'http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js',array('jquery'));
	wp_enqueue_script('counterUp', get_template_directory_uri() . '/js/counterup.js', array('jquery'));
	wp_enqueue_script('stickyfloat', get_template_directory_uri() . '/js/stickyfloat.js', array('jquery'));
	// Dev javascript
	wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true ); /* This should go first */
	}

	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	add_action( 'wp_enqueue_scripts', 'bootstrap_scripts' );

endif;

?>