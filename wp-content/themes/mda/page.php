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
		const navMenu = document.querySelector('.nav--bar');
		const navMenuBtn = document.getElementById('nav-menu-btn');

		navMenuBtn.addEventListener('click', () => {
			navMenu.classList.toggle("display--block");
		})
	</script>
</body>
<?php
