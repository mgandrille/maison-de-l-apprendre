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

	<main id="primary" class="site-main">

	<iframe id="haWidget" allowtransparency="true" scrolling="auto" src="https://www.helloasso.com/associations/la-maison-de-l-apprendre/evenements/test-festival-2/widget" style="width: 100%; height: 750px; border: none;" onload="window.scroll(0, this.offsetTop)"></iframe>		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
