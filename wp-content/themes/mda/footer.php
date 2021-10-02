<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mda
 */

?>
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-footer-links',
				'menu_id' => 'menu-footer-links',
				'menu_class' => 'footer-menu'
			)
		);
	?>

	<footer class="container-row wrapper-footer">
		<ul class="list-row-auto _footer-menu">
			<li><a href="https://www.maisondelapprendre.org/" target="_blank">La Maison de l'Apprendre</a></li>
			<li><a href="https://www.maisondelapprendre.org/contact" target="_blank">Nous Contacter</a></li>
		</ul>

		<ul class="list-row-auto _footer-menu">
			<li><a href="https://www.linkedin.com/company/maisondelapprendre/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
			<li><a href="https://www.facebook.com/Maisondelapprendre"  target="_blank"><i class="fab fa-facebook-square"></i></a></li>
		</ul>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>
