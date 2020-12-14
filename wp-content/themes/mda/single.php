<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mda
 */

get_header();
?>

<main id="primary" class="main" style="margin-top: 100px">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());

	endwhile;
	?>

</main>


<?php
get_footer();
