<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

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

<!-- SECTION CONTACT (bande rose) -->
<?php if(get_field('has_contact')) : ?>
	<section id="contact-pink" class="container">
		<div class="title">
			<a href="<?=get_field('contact_link');?>">Nous contacter</a>
		</div>
	</section>
<?php endif; ?>

<!-- SECTION PARTENAIRES -->
<?php if(get_field('has_partenaires')) : ?>
	<section id="partenaires_footer" class="container">
		<div class="title">Nos partenaires</div>
			<!-- <div class="partenaires">
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
				<a href="" target="_blank">
					<img src="" alt="">
				</a>
			</div> -->
		</div>
	</section>
<?php endif; ?>
