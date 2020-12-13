<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

?>

<article id="post-<?php the_ID(); ?>">
	
	<!--<header class="title--article">
		<h1>Atelier de création de bois</h1>
		<p>Animé par Créabois</p>
	</header>-->


	<header class="title--article">
		<?php
		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );
		else :
			the_title( '<h2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->


	<section class="display--row display--between-x">
		<div class="structure--article-content" >
			<header class="card--legend-article">
				<img src="https://i.postimg.cc/rs2hG5F3/bg.jpg" alt="banniere-atelier">
				<ul>
					<li>Début : 14h30 </li>
					<li>Durée : 1h30</li>
					<li>Tout public</li>
				</ul>
			</header>

            <div>
				<h2>Au programme</h2>	
				<p class="text--justify">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one  rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
			</div>
				
		</div>

		<aside class="structure--article-aside">
			<div>
				<header class="title--secondary">
					<h3>Parcours</h3>
					<span></span>
				</header>

				<p>Les événements à suivre après cet atelier</p>
			</div>

			<div>
				<header class="title--secondary">
					<h3>Intervenants</h3>
					<span></span>
				</header>

				<p>Benedicte Guacamole</p>
				<a href="http://google.fr">www.site-de-l-intervenant.fr</a>
			</div>

			<div class="card--absolute">
				<nav>
					<iframe id="haWidget" allowtransparency="true" src="https://www.helloasso.com/associations/la-maison-de-l-apprendre/evenements/test-festival-2/widget-bouton" style="width: 100%; height: 70px; border: none;"></iframe>
				</nav>
			</div>
		</aside>
</section>

<section class="bg--img_ bgbc margin--b-none" style="background-image: url('https://i.postimg.cc/KY0rrS3f/Copie-de-first-child-alone-last-child-font-size-4-5rem-color-color-main-margin-botto.png');">
	<header class="title--main-alone">
		<h2>
			Ateliers<br />
			similaires

			<span></span>
		</h2>
	</header>
</section>


</article>
