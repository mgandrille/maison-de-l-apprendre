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
	
	<header class="text-componant--block-title-article padding--xb">
		<h1>Créativité par le travail du bois</h1>
		<p>Animé par Créabois</p>
	</header>

	<section class="display--row margin--m-children">
		<div class="size--w60">
			<header>
				<img class="size--w100 img--fit" src="https://i.postimg.cc/rs2hG5F3/bg.jpg" alt="banniere-atelier">
				<ul class="display--row bg--light">
					<li>debut : 14h30 </li>
					<li>durée: 1h30</li>
					<li>Tout pulic</li>
				</ul>
			</header>

			<h2>Au programme</h2>	
			<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one  rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>	
		</div>

		<aside class="size--w40 bg--light">
			<p>Pacorurs</p>
			<p>intervenant</p>

			<div>
				<button class="button--btn">S'inscrire</button>
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
