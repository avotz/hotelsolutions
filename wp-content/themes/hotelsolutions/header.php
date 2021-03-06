<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotelsolutions
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/css/bootstrap.css">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();  ?>/img/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();  ?>/img/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();  ?>/img/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri();  ?>/img/favicons/manifest.json">
<link rel="mask-icon" href="<?php echo get_template_directory_uri();  ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body <?php body_class(); ?>>
<div class="preloader">
		<img src="<?php echo get_template_directory_uri();  ?>/img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" data-active-url="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php wp_nav_menu( array(
	             'theme_location' => 'header',
	             'menu_id' => 'header-menu',
	             'container'       => 'div',
	            'container_class' => 'collapse navbar-collapse',
	            'container_id'    => 'bs-example-navbar-collapse-1',
	            'menu_class'      => 'nav navbar-nav navbar-right main-nav ',
	              ) 
	          ); 
	          ?>
	          <div class="language">
	          	<?php echo do_shortcode('[gtranslate]'); ?>
	          </div>
			
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

