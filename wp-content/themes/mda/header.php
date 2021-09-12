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
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-0Q07B6CPVY"></script> -->
	<!-- <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-0Q07B6CPVY');
	</script> -->
</head>

<body class="<?= get_field('body_class') ?>">
	<?php wp_body_open(); ?>

	<?php if($post->post_name !== 'bientot') : ?>
	<!-- === Navigation === -->
	<nav class="container-row main-navigation">
		<a href="<?php echo home_url(); ?>"><img src="https://www.festivaldelapprendre.fr/wp-content/uploads/2021/01/Logo-festival.png" class="main-logo" alt="logo"></a>
		<i id="nav-btn" class="main-navigation-toggle-icon fas fa-bars"></i>
		<span id="close-nav-btn" class="display-none"><i class="fas fa-times"></i></span>

		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
					'menu_class' => 'main-menu'
				)
			);
		?>
	</nav>
	<?php endif; ?>

