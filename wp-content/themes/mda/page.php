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
		<nav class="display--row display--between-x padding--x-xb-children padding--y-m-children">
			<img src="" alt="logo">

			<ul class="display--row display--end-x padding--x-children text--upper">
				<li><a>Equipes</a></li>
				<li><a>Ateliers</a></li>
				<li><a>La Maison de l'apprendre</a></li>
			</ul>
		</nav>
	</header>
	
	<main id="primary">
		<?php get_template_part( 'template-parts/content', 'landing' ); ?>
	</main>	

</body>
<?php
