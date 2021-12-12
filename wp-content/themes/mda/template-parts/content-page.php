<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

use WPMailSMTP\Vendor\GuzzleHttp\Psr7\Query;

?>

<!-- <section class="container"> -->
	<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mda' ),
					array(
						'span' => array(
							'class' => array(),
						),	
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
	?>
<!-- </section> -->

<?php if($pagename === 'programme') : ?>

	<?= get_template_part('template-parts/content', 'selection-ateliers'); ?>

<?php endif; ?>

<!-- SECTION CONTACT (bande rose) -->
<?php if(get_field('has_contact')) : ?>
	<section id="contact-pink" class="container">
		<div class="title">
			<a href="<?=get_permalink( get_page_by_path( 'contact' ) );;?>">Nous contacter</a>
		</div>
	</section>
<?php endif; ?>

<!-- SECTION PARTENAIRES -->
<?php if(get_field('has_partenaires')) : ?>
	<section id="partenaires_footer" class="container">
		<div class="title">Nos partenaires</div>

			<?php
			$page = get_page_by_title( 'partenaires' );
			$content = apply_filters('the_content', $page->post_content);
			?>

			<div class="partenaires">
				<?= $content; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
