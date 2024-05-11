<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Que_Aprendí_-_Blog
 */

global $wpdb;
if(!isset($_SESSION))session_start();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>

	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'blog_theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			
		<nav id="site-navigation" class="main-navigation">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			); ?>
			<?php if (!is_user_logged_in()) { ?>
				<div class="sesion_box">
					<span class="register_button">Registrarse</span>
					<span class="login_button">Iniciar Sesión</span>
				</div>
			<?php } else { ?>
				<div>
					<span class="account_button"><i class="fa-solid fa-user"></i> Mi Cuenta</span>
				</div>
			<?php } ?>
			<div id="register_box">
				<div>
					<span class="close_button"><i class="fa-solid fa-xmark"></i></span>
				</div>
				<!-- Formulario de registro -->
				<p>Registrarse</p>
				<form class="register_form" action="<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>" method="post">
					<!-- Agregar los datos a "wp_users" -->	
					<label for="reg_username">Usuario:</label>
					<input type="text" name="user_login" id="reg_username">

					<label for="reg_email">Correo Electrónico:</label>
					<input type="email" name="user_email" id="reg_email">

					<label for="reg_password">Contraseña:</label>
					<input type="password" name="user_password" id="reg_password">

					<input type="submit" value="Registrarse">
				</form>
			</div>

			<div id="login_box">
			<div>
				<span class="close_button"><i class="fa-solid fa-xmark"></i></span>
			</div>
				<?php if (!is_user_logged_in()) { ?>
					<div class="login-form">
						<!-- Iniciar Sesion -->
						<div>
							<p>Iniciar Sesión</p>
						</div>
						<?php //include("login.php"); ?>
						<?php wp_login_form(); ?>
					</div>
				<?php } else { ?>
					<a href="<?php echo wp_logout_url(home_url()); ?>" onclick="return confirm('¿Desea cerrar la sesión actual?')">Cerrar Sesión</a>				
				<?php } ?>
		</div>

		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
