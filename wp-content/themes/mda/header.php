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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<?php wp_head(); ?>
</head>

<!-- === Navigation === -->
<header class="structure--nav">
	<nav class="display--row display--between-x display--center-y">
		<img src="http://localhost/wordpress/maison-de-l-apprendre/wp-content/uploads/2020/12/MDA_Logo_vectorise.png" class="nav--logo" alt="logo">

		<div class="size--wauto display-md--none">
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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	
