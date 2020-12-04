<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

?>


<!-- 
=== HERO LANDING
-->

<section class="text-upper row between h-100 bg-gradient center-y overflow-hidden">

	<!-- === Titre === -->
	<div class="w-auto m-none-children relative">
		<h2 class="h4 color-grey relative">
			du 21 au 27 janvier 2021
			<span class="elmt-border-dotted main xy_ b-50 l-20"></span>
		</h2>

		<h1 class="title-landing text-letter-spacing color-main">
			festival de<br>
			l'apprendre
		</h1>

		<h2 class="text-right h4 color-grey w-100">
			en famille, entre collègues, entre amis,<br />
			venez fêter le plaisir d'apprendre
		</h2>

		<span class="elmt-border-dotted main xy_ b-80 l-30 rotate90"></span>
	</div>

	<!-- === Badges circulaires === --->
	<div class="absolute w-40 h-70 xy_ t10 l40 between text-upper text-bold">
		<div class="h-25 row end-y between">
			<div class="elmt-circle-b m-b-auto bg-secondary color-white center">
				<span>Découvrir</span>
			</div>
			<div class="elmt-circle-m bg-warm color-white center">
				<span class=" text-small">Rencontrer</span>
			</div>
		</div>

		<div class="elmt-circle-m bg-main color-white m-l-s center">
			<span class=" text-small">Expérimenter</span>
		</div>
	</div>

	<!-- === Illustration === --->
	<figure class="h-100 bg-img_ bgauto bgbr"></figure>
</section>


<!-- 
=== CONTENT
-->

<section class="row between wrap">

	<!-- === Titre de la section === --->
	<header class="block-title">
		<h2 class="relative">
			Découvrir<br />
			le festival

			<span class="elmt-border-dotted main xy_ t-10 l-60"></span>
		</h2>

		<h3>Une journée pour apprendre et découvrir</h3>
	</header>

	<!-- === description de la section === --->
	<div class="block-parag">
		<p>
			Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
			est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
			de développement des compétences tout au long de la vie.
		</p>
	</div>
</section>

<section class="row between wrap">
	<header class="block-title">
		<h2 class="relative">
			Ateliers<br />
			et conférences

			<span class="elmt-border-dotted main xy_ t-10 l-60"></span>
		</h2>

		<h3>Comprendre le monde de demain</h3>
	</header>

	<div class="block-parag">
		<p>
			Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
			est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
			de développement des compétences tout au long de la vie.
		</p>
	</div>
</section>


<!-- 
=== SELECTION DES ATELIERS
-->

<section class="bg-gradient">
	<div class="bg-white w-100">

		<!-- === filter bar === --->
		<header class="bg-white-pure">
			<form class="row w-100">
				<input type="text" class="searchbar" name="search" placeholder="Rechercher un atelier">

				<div class="row">
					<input type="checkbox" name="all" id="all">
					<label for="all">Tout public</label>

					<input type="checkbox" name="young" id="young">
					<label for="young">Jeunesse</label>

					<input type="checkbox" name="pro" id="pro">
					<label for="pro">Jeunesse</label>
				</div>

				<ul class="row border-l-children border-grey-children">
					<li>Tous</li>	
					<li>Catégorie</li>
					<li>Programme</li>
				</ul>
			</form>
		</header>

		<!-- === Article === --->
		<div class="card-gallerie-4 p-m">
			<article class="card bg-white-pure">
				<header class="head card-bg h-20"></header>
				<div class="body">
					<ul class="card-tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="m-l-auto">jeunesse</li>
					</ul>

					<h3>Titre atelier</h3>	
					<p>Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum</p>
				</div>
				<footer class="foot"></footer>
			</article>
		</div>
	</div>
</section>