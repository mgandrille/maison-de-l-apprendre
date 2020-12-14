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
	<header class="header">
		<nav class="nav display--row display--between-x display--center-y">
			<img src="<?=content_url()?>/themes/mda/img/logo_mda.png" class="img nav--logo" alt="logo">

			<div class="div size--wauto display-md--none">
				<p id="nav-menu-btn">menu</p>
			</div>

			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'my-custom-menu',
						'menu_id' => 'nav-menu',
						'container_class' => 'nav--bar'
					)
				);
			?>
		</nav>
	</header>

