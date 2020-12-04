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

<section class="text-upper display--row display--between-x h-100 bg-gradient display--center-y display--overflow-hidden position--relative">

	<!-- === Titre === -->
	<div class="w-auto margin--m-none-children position--relative">
		<h2 class="title--h4 color-grey position--relative">
			du 21 au 27 janvier 2021

			<!-- === Separateur pointillé === -->
			<span class="shape--elmt-border-dotted main position--xy_ b-50 l-20"></span>
		</h2>

		<h1 class="title--title-landing text-letter-spacing color-main">
			festival de<br>
			l'apprendre
		</h1>

		<h2 class="text-right title--h4 color-grey w-100">
			en famille, entre collègues, entre amis,<br />
			venez fêter le plaisir d'apprendre
		</h2>

		<span class="shape--elmt-border-dotted main position--xy_ b-80 l-30 shape--rotate90"></span>
	</div>

	<!-- === Badges circulaires === --->
	<div class="position--absolute w-40 h-70 position--xy_ t10 l40 display--between-x text-upper text-bold">
		<div class="h-25 display--row end-y display--between-x">
			<div class="shape--elmt-circle-b margin--m-b-auto bg-secondary color-white display--center">
				<span>Découvrir</span>
			</div>
			<div class="shape--elmt-circle-m bg-warm color-white display--center">
				<span class=" text-small">Rencontrer</span>
			</div>
		</div>

		<div class="shape--elmt-circle-m bg-main color-white margin--m-l-s display--center">
			<span class=" text-small">Expérimenter</span>
		</div>
	</div>

	<!-- === Illustration === --->
	<figure class="h-100 bg-img_ bgauto bgbr"></figure>
</section>


<!-- 
=== CONTENT
-->

<section class="display--row display--between-x wrap">

	<!-- === Titre de la section === --->
	<header class="block-title">
		<h2 class="position--relative">
			Découvrir<br />
			le festival

			<span class="shape--elmt-border-dotted main position--xy_ t-10 l-60"></span>
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

<section class="display--row display--between-x wrap">
	<header class="block-title">
		<h2 class="position--relative">
			Ateliers<br />
			et conférences

			<span class="shape--elmt-border-dotted main position--xy_ t-10 l-60"></span>
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
		<header class="bg-white-pure h-10 display--center-x">
			<form class="display--row w-100 display--center-y display--between-y">

				<!-- === search bar === --->
				<input type="text" class="searchbar w-50 border" name="search" placeholder="Rechercher un atelier">

				<!-- === filter on tag === --->
				<div class="display--row align--center margin--m-s-children border">
					<input type="checkbox" name="all" id="all">
					<label for="all">Tout public</label>

					<input type="checkbox" name="young" id="young">
					<label for="young">Jeunesse</label>

					<input type="checkbox" name="pro" id="pro">
					<label for="pro">Professionnels</label>
				</div>

				<!-- === change display : cards by filter (date, category, etc...) / cards by workshop / png programm === --->
				<ul class="display--row display--center-y display--between-x margin--m-s-children shape--border-l-children shape--border-grey-children">
					<li>Tous</li>	
					<li>Filtrer</li>
					<li>Programme</li>
				</ul>
			</form>
		</header>

		<!-- === Articles === --->
		<div class="card-gallerie card-gallerie-4 p-m ">
			<article class="card bg-white-pure display--overflow-hidden">
				<header class="head card-bg h-20"></header>
				<div class="body">
					<ul class="card-tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative w-100 title--h2 margin--m-b-s">
						<span class="shape--elmt-border-dotted main position--xy_ t-50 r-30"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="foot end-y">
					<button class="btn">Voir l'atelier</button>
				</footer>
			</article>

			<article class="card bg-white-pure display--overflow-hidden">
				<header class="head card-bg h-20"></header>
				<div class="body">
					<ul class="card-tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative w-100 title--h2 margin--m-b-s">
						<span class="shape--elmt-border-dotted main position--xy_ t-50 r-30"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="foot end-y">
					<button class="btn">Voir l'atelier</button>
				</footer>
			</article>

			<article class="card bg-white-pure display--overflow-hidden">
				<header class="head card-bg h-20"></header>
				<div class="body">
					<ul class="card-tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--position--relative w-100 title--h2 margin--m-b-s">
						<span class="shape--elmt-border-dotted main position--xy_ t-50 r-30"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="foot end-y">
					<button class="btn">Voir l'atelier</button>
				</footer>
			</article>

			<article class="card bg-white-pure display--overflow-hidden">
				<header class="head card-bg h-20"></header>
				<div class="body">
					<ul class="card-tag">
						<li>24/11/2020</li>
						<li>14h30</li>
						<li class="margin--m-l-auto">jeunesse</li>
					</ul>

					<h3 class="position--relative w-100 title--h2 margin--m-b-s">
						<span class="shape--elmt-border-dotted main position--xy_ t-50 r-30"></span>
						Titre atelier
					</h3>	

					<p class="margin--m-t-none">
						Courte description lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora earum numquam libero quod eum
					</p>
				</div>
				<footer class="foot end-y">
					<button class="btn">Voir l'atelier</button>
				</footer>
			</article>	
		</div>
	</div>
</section>

<footer class="bg-gradient h-20 ">
	<figure class="bg-footer w-100 h-100p p-xb">
	contact
	Twitter
	Réseau
	</figure>
</footer>