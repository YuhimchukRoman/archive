<?php
/**
 * Functions
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Enqueue Scripts and Styles for Front-End */
require_once( 'library/enqueue-scripts.php' );

/** Register Menus and Sidebars */
require_once('library/navigation.php');

/** Various functions required for Bootstrap to work properly */
require_once('library/bootstrap.php');

/******************************************************************************
				Additional Functions
*******************************************************************************/

// Remove #more anchor from posts
	function remove_more_jump_link($link) {
		$offset = strpos($link, '#more-');
		if ($offset) { $end = strpos($link, '"',$offset); }
		if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
		return $link;
	}
	add_filter('the_content_more_link', 'remove_more_jump_link');


// Register Post Type Slider
	function post_type_slider() {
	$post_type_slider_labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'slide' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit' ),
		'new_item'           => __( 'New ' ),
		'all_items'          => __( 'All' ),
		'view_item'          => __( 'View' ),
		'search_items'       => __( 'Search for a slide' ),
		'not_found'          => __( 'No slides found' ),
		'not_found_in_trash' => __( 'No slides found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$post_type_slider_args = array(
		'labels'        => $post_type_slider_labels,
		'description'   => 'Display Slider',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-gallery',
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
		'has_archive'   => true,
		'hierarchical'  => true
	);
	register_post_type( 'slide', $post_type_slider_args );
	}
	add_action( 'init', 'post_type_slider' );


	// Install Recommended plugins
	require_once dirname( __FILE__ ) . '/inc/plugin-activation.php';

	function ba_theme_register_required_plugins() {
		$plugins = array(
			/** This is an example of how to include a plugin pre-packaged with a theme */

			array(
				'name'     => 'Advanced Custom Fields Pro', // The plugin name
				'slug'     => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)
				'source'   => 'http://projects.beetroot.se/upload/plugins/acf-pro/advanced-custom-fields-pro.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Gravity Forms', // The plugin name
				'slug'     => 'gravity-forms', // The plugin slug (typically the folder name)
				'source'   => 'http://projects.beetroot.se/upload/plugins/gravityforms/gravityforms.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Custom Post Type UI', // The plugin name
				'slug'     => 'custom-post-type-ui', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/custom-post-type-ui.1.1.1.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Login LockDown', // The plugin name
				'slug'     => 'login-lockdown', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/login-lockdown.1.6.1.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'WordPress SEO by Yoast', // The plugin name
				'slug'     => 'wordpress-seo', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/wordpress-seo.2.2.1.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Google Analytics by Yoast', // The plugin name
				'slug'     => 'google-analytics-for-wordpress', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/google-analytics-for-wordpress.5.4.2.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'WordPress Duplicator', // The plugin name
				'slug'     => 'duplicator', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/duplicator.0.5.22.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Disable Emojis', // The plugin name
				'slug'     => 'disable-emojis', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/disable-emojis.1.5.1.zip', // The plugin source
				'required' => true,
			),
			array(
				'name'     => 'Black Studio TinyMCE Widget', // The plugin name
				'slug'     => 'black-studio-tinymce-widget', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/black-studio-tinymce-widget.2.2.4.zip', // The plugin source
				'required' => true,
			)
		);
		tgmpa( $plugins );
	}
	add_action( 'tgmpa_register', 'ba_theme_register_required_plugins' );

// Stick Admin Bar To The Top
	if (!is_admin() && is_user_logged_in()) {
		add_action('get_header', 'ba_filter_head');

		function ba_filter_head() {
			remove_action('wp_head', '_admin_bar_bump_cb');
		}

		function stick_admin_bar() {
			echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
				@media screen and (max-width: 600px) {
					body.admin-bar { margin-top:46px !important }
				}
			</style>
			";
		}

		add_action('admin_head', 'stick_admin_bar');
		add_action('wp_head', 'stick_admin_bar');
	}

// Customize Login Screen
	function wordpress_login_styling() { ?>
		<style type="text/css">
			.login #login h1 a {
				background-image: url('<?php echo get_header_image(); ?>');
				background-size: contain;
				width: auto;
				height: 220px;
			}
		   body.login{
			   background-color: #<?php echo get_background_color(); ?>;
			   background-image: url('<?php echo get_background_image(); ?>') !important;
			   background-repeat: repeat;
			   background-position: center center;
		   };

		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

	function admin_logo_custom_url(){
		$site_url = get_bloginfo('url');
		return ($site_url);
	}
	add_filter('login_headerurl', 'admin_logo_custom_url');



// ACF Pro Options Page

	// if( function_exists('acf_add_options_page') ) {

	//     acf_add_options_page(array(
	//         'page_title'    => 'Theme General Settings',
	//         'menu_title'    => 'Theme Settings',
	//         'menu_slug'     => 'theme-general-settings',
	//         'capability'    => 'edit_posts',
	//         'redirect'      => false
	//     ));

	// }

/*********************** PUT YOU FUNCTIONS BELOW ********************************/

 add_image_size( 'main_banner', 1170, 550, array('center','center'));
 add_image_size( 'year_img', 230, 165, false);
 add_image_size( 'health_care', 514, 640, array('center','center'));
function js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}

function js_array($array)
{
    $temp = array_map('js_str', $array);
    return '[' . implode(',', $temp) . ']';
}
















/*******************************************************************************/
