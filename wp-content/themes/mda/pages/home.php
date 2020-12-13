<?php
/**
 * Template Name: Accueil
 *
 * @package mda
*/

/**
 * get all posts/articles in an array ($events) to be dispatched in cards
*/
$events = get_all_posts_infos();
d($events);


//add header section
get_header();

?>

<!--
=== HERO LANDING
-->

<section class="structure--hero">

	<!-- === Titre === -->
	<header class="structure--hero-title">
		<span></span>

		<div class="h2">du 21 au 27 janvier 2021</div>
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
</section>


<!--
=== CONTENT
-->

<section class="display--row display--between-x display--wrap">

	<!-- === Titre de la section === --->
	<header class="title--main">
		<h2>
			Découvrir<br />le festival
			<span></span>
		</h2>

		<h6>Une journée pour apprendre et découvrir</h6>
	</header>

	<!-- === description de la section === --->
	<div>
		<p>
			Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
			est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
			de développement des compétences tout au long de la vie.
		</p>
	</div>
</section>

<section class="display--row display--between-x">
	<header class="title--main">
		<h2>
			Ateliers<br />et conférences
			<span ></span>
		</h2>

		<h6>Comprendre le monde de demain</h6>
	</header>

	<div>
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
			<?php foreach($events as $event) :
				get_template_part( 'template-parts/event-card', null, array(
					'id' => $event['ID'],
					'image' => $event['logo']->publicUrl,
					'title' => $event['post_title'],
					'categories'  => $event['categories'],
					'date' => $event['startDate'],
					'small_content' => $event['description'],
					));
			endforeach; ?>
		</div>
	</div>
</section>