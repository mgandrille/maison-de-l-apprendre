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

<section class="structure--hero">

	<!-- === Titre === -->
	<header class="structure--hero-title">
		<span></span>

		<h2>du 21 au 27 janvier 2021</h2>
		<h1>festival de<br>l'apprendre</h1>
		<h2>en famille, entre collègues, entre amis,<br />venez fêter le plaisir d'apprendre</h2>

		<span></span>
	</header>

	<!-- === Badges circulaires === -->
	<div class="structure--hero-slot">
		<div class="shape--badge-b">
			<span>Découvrir</span>
		</div>

		<div class="shape--badge-m">
			<span>Rencontrer</span>
		</div>

		<div class="shape--badge-m">
			<span>Expérimenter</span>
		</div>
	</div>

	<!-- === Illustration === -->
	<!--<figure class="size--w100 size--h100p position--absolute position--xy-br bg--img_ _bg-br display--none display-sm--flex"></figure>-->
</section>


<!-- 
=== CONTENT
-->

<section class="display--row display--between-x display--wrap">

	<!-- === Titre de la section === --->
	<header class="text-componant--block-title">
		<h2 class="position--relative">
			Découvrir<br />
			le festival

			<span class="position--xy_ t-10 l-60 shape--elmt-border-dotted_ _main"></span>
		</h2>

		<h6>Une journée pour apprendre et découvrir</h6>
	</header>

	<!-- === description de la section === --->
	<div class="text-componant--block-parag">
		<p>
			Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
			est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
			de développement des compétences tout au long de la vie.
		</p>
	</div>
</section>

<section class="display--row display--between-x wrap">
	<header class="text-componant--block-title">
		<h2 class="position--relative">
			Ateliers<br />
			et conférences

			<span class="position--xy_ t-10 l-60 shape--elmt-border-dotted_ _main"></span>
		</h2>

		<h6>Comprendre le monde de demain</h6>
	</header>

	<div class="text-componant--block-parag">
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

<section class="bg--gradient padding--y-xb">
	<div class="size--w100 bg--white">

		<!-- === filter bar === --->
		<!-- <header class="size--h10 display--center-x bg--white-pure">
			<form class=" size--w100 display--row display--center-y display--between-y">

				<-- === search bar === 
				<input type="text" class="size--w50" name="search" placeholder="Rechercher un atelier">

				<-- === filter on tag === 
				<div class="margin--m-s-children display--row display--center">
					<input type="checkbox" name="all" id="all">
					<label for="all">Tout public</label>

					<input type="checkbox" name="young" id="young">
					<label for="young">Jeunesse</label>

					<input type="checkbox" name="pro" id="pro">
					<label for="pro">Professionnels</label>
				</div>

				<-- === change display : cards by filter (date, category, etc...) / cards by workshop / png programm === 
				<ul class="margin--m-s-children display--row display--center-y display--between-x shape--border-l-children_ _grey">
					<li>Tous</li>	
					<li>Filtrer</li>
					<li>Programme</li>
				</ul>
			</form>
		</header> -->

		<!-- === Articles === --->
		<div class="card--gallerie card--gallerie-2 card--gallerie-sm-2 card--gallerie-md-2 padding--m">
			<article class="card--card display--overflow-hidden padding--s-children bg--white-pure">
				<header class="size--h20 card--bg structure--head"></header>
				<div class="structure--body">
					<ul class="card--tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative size--w100 margin--m-b-s title--h4">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted_ _main"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="structure--foot display--end-y">
					<button class="button--btn">Voir l'atelier</button>
				</footer>
			</article>

			<article class="card--card display--overflow-hidden padding--s-children bg--white-pure">
				<header class="size--h20 card--bg structure--head"></header>
				<div class="structure--body">
					<ul class="card--tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative size--w100 margin--m-b-s title--h4">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted_ _main"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="structure--foot display--end-y">
					<button class="button--btn">Voir l'atelier</button>
				</footer>
			</article>

			<article class="card--card display--overflow-hidden padding--s-children bg--white-pure">
				<header class="size--h20 card--bg structure--head"></header>
				<div class="structure--body">
					<ul class="card--tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative size--w100 margin--m-b-s title--h4">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted_ _main"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="structure--foot display--end-y">
					<button class="button--btn">Voir l'atelier</button>
				</footer>
			</article>

			<article class="card--card display--overflow-hidden padding--s-children bg--white-pure">
				<header class="size--h20 card--bg structure--head"></header>
				<div class="structure--body">
					<ul class="card--tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative size--w100 margin--m-b-s title--h4">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted_ _main"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="structure--foot display--end-y">
					<button class="button--btn">Voir l'atelier</button>
				</footer>
			</article>
		</div>
	</div>
</section>