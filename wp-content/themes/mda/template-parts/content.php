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
	
	<header class="text-componant--block-title-article padding--x-xb">
		<h1>Créativité par le travail du bois</h1>
		<p>Animé par Créabois</p>
	</header>

	<section class="display--row margin--children">
		<div class="size--w60">
			<header>
				<img class="size--w100 size--h50 img--fit" src="https://i.postimg.cc/rs2hG5F3/bg.jpg" alt="banniere-atelier">
				<ul class="display--row display--between-x bg--light padding--m-children title--h6 text--upper text--center">
					<li class="shape--border-r_ _grey size--w100 display--center"><span class="text--bold">Début : </span> 14h30 </li>
					<li class="shape--border-r_ _grey size--w100 display--center"><span class="text--bold">Durée : </span> 1h30</li>
					<li class="text--main text--bold size--w100 display--center">Tout public</li>
				</ul>
			</header>

            <div>
				<h2>Au programme</h2>	
				<p class="text--justify">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one  rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
			</div>
				
		</div>

		<aside class="position--relative size--w40 size--h65 padding--m-children bg--light">
			<div>
				<header class="text-componant--block-title-aside">
					<h3>Parcours</h3>
					<span></span>
				</header>

				<p class="title--h6">Les événements à suivre après cet atelier</p>
			</div>

			<div>
				<header class="text-componant--block-title-aside">
					<h3>Intervenants</h3>
					<span></span>
				</header>

				<p class="title--h6">Benedicte Guacamole</p>
				<a href="http://google.fr">www.site-de-l-intervenant.fr</a>
			</div>

			<div class="position--absolute position--xy_ b-10 l10 bg--action size--w80">
				<nav>
					<iframe id="haWidget" allowtransparency="true" src="https://www.helloasso.com/associations/la-maison-de-l-apprendre/evenements/test-festival-2/widget-bouton" style="width: 100%; height: 70px; border: none;"></iframe>
				</nav>
			</div>
		</aside>
</section>

<section class="bg--img_ bgbc" style="background-image: url('https://i.postimg.cc/KY0rrS3f/Copie-de-first-child-alone-last-child-font-size-4-5rem-color-color-main-margin-botto.png');">
	<header class="text-componant--block-title">
		<h2 class="position--relative alone">
			Ateliers<br />
			similaires

			<span class="position--xy_ t-10 l-60 shape--elmt-border-dotted shape--main"></span>
		</h2>
	</header>
</section>

<section class="bg--light">
	<p>articles</p>
</section>



</article><?php the_ID(); ?>
