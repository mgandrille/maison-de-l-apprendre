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
	<header class="position--fixed bg--white ">
		<nav class="display--row display--between-x display--center-y padding--x-xb-children padding--y-s-children">
			<figure class="size--wauto">
				<img src="https://i.postimg.cc/HWMvPvmT/MDA-Logo-vectoris.png" class="nav--logo padding--x" alt="logo">
			</figure>

			<div class="display--row display--end-x ">
				<p id="nav-menu-btn" class="display-md--none">menu</p>
			</div>
			<ul id="nav-menu" class="size--w-mdauto size--w100 display--none display-md--flex display--row display--end-x padding--x-children text--upper">
				<li><a>Equipes</a></li>
				<li><a>Ateliers</a></li>
				<li><a>La Maison de l'apprendre</a></li>
			</ul>
		</nav>
	</header>
	
	<main id="primary">
		<?php get_template_part( 'template-parts/content', 'landing' ); ?>
	</main>	

	<script>
		const navMenu = document.getElementById('nav-menu');
		const navMenuBtn = document.getElementById('nav-menu-btn');

		navMenuBtn.addEventListener('click', () => {
			navMenu.classList.toggle("display--none");
			navMenu.classList.toggle("nav--full")
		})
	</script>
</body>
<?php
