<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

get_header();
?>	
	<!-- === Navigation === -->
	<header class="position--fixed bg--white padding--x-xb padding--y-s">
		<nav class="display--row display--between-x display--center-y">
			<img src="https://i.postimg.cc/HWMvPvmT/MDA-Logo-vectoris.png" class="nav--logo" alt="logo">

			<div class="size--wauto display-md--none">
				<p id="nav-menu-btn">menu</p>
			</div>

			<ul id="nav-menu" class="nav--bar nav-md--bar display--none display-md--flex">
				<li><a href="#">Equipes</a></li>
				<li><a href="#">Ateliers</a></li>
				<li><a href="#">La Maison de l'apprendre</a></li>
			</ul>
		</nav>
	</header>
	
	<!-- === Affichage des templates de page === -->
	<main id="primary">
		<?php get_template_part( 'template-parts/content', 'landing' ); ?>
	</main>	

	<script>
		const navMenu = document.getElementById('nav-menu');
		const navMenuBtn = document.getElementById('nav-menu-btn');

		navMenuBtn.addEventListener('click', () => {
			navMenu.classList.toggle("display--none");
		})
	</script>
</body>
<?php
