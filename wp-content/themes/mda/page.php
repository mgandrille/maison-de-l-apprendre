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


//  var_dump(get_field('body_class'));
get_header();
?>

	<main id="primary" class="container-main">

	<?php
		get_template_part( 'template-parts/content', 'page' );
	?>

	</main>

<?php
get_footer();