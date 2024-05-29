<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liceo_Carmen_Arriaran
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'carmen_arriaran' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header_top">
			<ul>
				<li><i class="fa-solid fa-phone"></i> 2 2286 2340</li>
				<li><i class="fa-regular fa-envelope"></i> lcarmenarriaran@gmail.com</li>
			</ul>
		</div>
		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<?php wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu', 
					));?>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->
