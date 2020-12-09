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

	<!-- === Footer === -->
	<footer class="size--h20 bg--gradient">
		<figure class="size--w100 text--main size--h100p padding--xb bg--footer display--row display--between-x  display--center-y">
			<ul class="display--row size--wauto padding--s-children">
				<li><a class="text--main" href="#">Contactez-nous</a></li>
				<li><a class="text--main" href="#">HelloAsso</a></li>
				<li><a class="text--main" href="#">L'équipe MDA</a></li>
			</ul>

			<ul class="display--row size--wauto  padding--s-children">
				<li><i class="title--h4 fab fa-twitter-square"></i></li>
				<li><i class="title--h4 fab fa-instagram-square"></i></li>
				<li><i class="title--h4 fab fa-facebook-square"></i></li>
			</ul>
		</figure>
	</footer>

	<script>
		const navMenu = document.getElementById('nav-menu');
		const navMenuBtn = document.getElementById('nav-menu-btn');

		navMenuBtn.addEventListener('click', () => {
			navMenu.classList.toggle("display--none");
		})
	</script>
</body>
<?php
