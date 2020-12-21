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

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-0Q07B6CPVY"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-0Q07B6CPVY');
	</script>
</head>

<body>
	<?php wp_body_open(); ?>

	<!-- === Navigation === -->
	<nav class="container-row main-navigation">
		<a href="https://www.festivaldelapprendre.fr/"><img src="<?=content_url()?>/themes/mda/img/logo_festival.png" class="main-logo" alt="logo"></a>
		<i id="nav-btn" class="main-navigation-toggle-icon fas fa-bars"></i>

		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'menu_class' => 'main-menu'
				)
			);
		?>
	</nav>

