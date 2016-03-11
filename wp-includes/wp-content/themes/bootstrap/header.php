<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Add Favicon -->
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-touch-icon-precomposed.png">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
     </head>

     <body <?php body_class(); ?>>

	<?php // Enables offcanvas menu if its active
	mobile_offcanvas_start();?>

	<header class="header">
		<div class="apl-hidden-menu">
		<div class="container">	
		<div class="apl-menu-btn">
							<span>
							<?php if (get_field('menu_button_hidden')):
								the_field('menu_button_hidden');
								endif;?>
							</span>
							<img src="<?php echo get_template_directory_uri();?>/images/x.png" alt="">
						</div>
		<ul>
		<?php if (have_rows('menu_items')):
			$i=1;
				while (have_rows('menu_items')):
							the_row();
						?>
						<li>
							<a href="#section<?php echo $i;?>">
							<?php if (get_sub_field('heading')):
							the_sub_field('heading');
							endif;?>
							</a> 
						</li>
						<?php
						$i++;
						endwhile;
					endif;
				 ?>
		</ul>
		</div>
		</div>
		<nav>
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-3 apl-main-logo">
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_header_image(); ?>" alt="<?php bloginfo('name'); ?>"/></a>
					</div>
					<div class="col-md-8 col-sm-6 ">
						<h1><?php bloginfo('name')?></h1>
						<h2><?php bloginfo('description')?></h2>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-12">
						<?php if(get_field('footer_link')) : ?>
							<a href="<?php the_field('footer_link');?>">
						    <?php if(get_field('footer_link_text')) :
						    the_field('footer_link_text');
						    endif;?>
							<img src="<?php echo get_template_directory_uri();?>/images/arrow.png" alt="">
							</a>
						<?php endif;?>
						
						<?php do_action('wpml_add_language_selector'); ?>
						<div class="apl-menu-btn">
							<span>
							<?php if (get_field('menu_button_text')):
								the_field('menu_button_text');
								endif;?>
							</span>
							<img src="<?php echo get_template_directory_uri();?>/images/bars.svg" alt="">
							
						</div>
					</div>
				</div><!--END of row -->
			</div><!--END of container -->
		</nav>
	</header><!--END of header -->