<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mda
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="body">
	<?php wp_body_open(); ?>

	<!-- === Navigation === -->
	<nav class="container container-row type--navbar">
		<a href="http://localhost/maison-de-l-apprendre/"><img src="<?=content_url()?>/themes/mda/img/logo_mda.png" class="type--logo" alt="logo"></a>
		<i id="nav-btn" class="type--toggle-icon fas fa-bars"></i>

		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'menu_class' => 'type--menu'
				)
			);
		?>
	</nav>

