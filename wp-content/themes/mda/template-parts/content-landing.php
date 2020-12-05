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

<section class="position--relative size--h100 display--row display--between-x text--upper display--center-y display--overflow-hidden bg--gradient">

	<!-- === Titre === -->
	<div class=" position--relative size--wauto margin--m-none-children">
		<h2 class="position--relative title--h4 text--color-grey">
			du 21 au 27 janvier 2021

			<!-- === Separateur pointillé === -->
			<span class="position--xy_ b-50 l-20 shape--elmt-border-dotted shape--main"></span>
		</h2>

		<h1 class="title--title-landing text--letter-spacing text--color-main">
			festival de<br>
			l'apprendre
		</h1>

		<h2 class="size--w100 text--right title--h4 text--color-grey">
			en famille, entre collègues, entre amis,<br />
			venez fêter le plaisir d'apprendre
		</h2>

		<span class="position--xy_ b-80 l-30 shape--elmt-border-dotted shape--main shape--rotate90"></span>
	</div>

	<!-- === Badges circulaires === --->
	<div class="position--absolute position--xy_ t10 l40 size--w40 size--h70  display--between-x text--upper text--bold">
		<div class="size--h25 display--row display--end-y display--between-x">
			<div class="margin--m-b-auto display--center shape--elmt-circle-b text--color-white bg--secondary">
				<span>Découvrir</span>
			</div>
			<div class="shape--elmt-circle-m display--center text--color-white bg--warm">
				<span class="text--small">Rencontrer</span>
			</div>
		</div>

		<div class="margin--m-l-s shape--elmt-circle-m display--center text--color-white bg--main">
			<span class="text--small">Expérimenter</span>
		</div>
	</div>

	<!-- === Illustration === --->
	<figure class="size--h100 bg--img_ bgauto bgbr"></figure>
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

			<span class="position--xy_ t-10 l-60 shape--elmt-border-dotted shape--main"></span>
		</h2>

		<h3>Une journée pour apprendre et découvrir</h3>
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

			<span class="position--xy_ t-10 l-60 shape--elmt-border-dotted shape--main"></span>
		</h2>

		<h3>Comprendre le monde de demain</h3>
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

<section class="bg--gradient">
	<div class="size--w100 bg--white">

		<!-- === filter bar === --->
		<header class="size--h10 display--center-x bg--white-pure">
			<form class=" size--w100 display--row display--center-y display--between-y">

				<!-- === search bar === --->
				<input type="text" class="size--w50" name="search" placeholder="Rechercher un atelier">

				<!-- === filter on tag === --->
				<div class="margin--m-s-children display--row display--center">
					<input type="checkbox" name="all" id="all">
					<label for="all">Tout public</label>

					<input type="checkbox" name="young" id="young">
					<label for="young">Jeunesse</label>

					<input type="checkbox" name="pro" id="pro">
					<label for="pro">Professionnels</label>
				</div>

				<!-- === change display : cards by filter (date, category, etc...) / cards by workshop / png programm === --->
				<ul class="margin--m-s-children display--row display--center-y display--between-x shape--border-l-children shape--border-grey-children">
					<li>Tous</li>	
					<li>Filtrer</li>
					<li>Programme</li>
				</ul>
			</form>
		</header>

		<!-- === Articles === --->
		<div class="card--gallerie card--gallerie-4 padding--m">
			<article class="card--card display--overflow-hidden padding--s-children bg--white-pure">
				<header class="size--h20 card--bg structure--head"></header>
				<div class="structure--body">
					<ul class="card--tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative size--w100 margin--m-b-s title--h2">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted shape--main"></span>
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

					<h3 class="position--relative size--w100 margin--m-b-s title--h2">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted shape--main"></span>
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

					<h3 class="position--relative size--w100 margin--m-b-s title--h2">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted shape--main"></span>
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

					<h3 class="position--relative size--w100 margin--m-b-s title--h2">
						<span class="position--xy_ t-50 r-30 shape--elmt-border-dotted shape--main"></span>
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

<footer class="size--h20 bg--gradient">
	<figure class="size--w100 size--h100p padding--xb bg--footer">
	contact
	Twitter
	Réseau
	</figure>
</footer>