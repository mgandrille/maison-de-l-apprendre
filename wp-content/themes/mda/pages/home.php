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

get_header();
?>

<!-- === HERO LANDING === -->

<main class="main">
	<section class="section structure--hero">

		<!-- Titre -->
		<header class="header title--hero">
			<span><!-- bordure --></span>

			<div class="div h2">du 21 au 27 janvier 2021</div>
			<h1>festival de<br>l'apprendre</h1>
			<h2>en famille, entre collègues, entre amis,<br />venez fêter le plaisir d'apprendre</h2>

			<span><!-- bordure --></span>
		</header>

		<!-- Badges circulaires -->
		<div class="div structure--hero-badges">
			<div class="div shape--badge-b">
				<span>Découvrir</span>
			</div>

			<div class="div shape--badge-m">
				<span>Rencontrer</span>
			</div>

			<div class="div shape--badge-m">
				<span>Expérimenter</span>
			</div>
		</div>
	</section>


	<!-- === PRESENTATION === -->

	<section class="section display--row display--between-x display--wrap">

		<!-- Titre de la section --->
		<header class="header title--main">
			<h2>
				Découvrir<br />le festival
				<span></span>
			</h2>

			<h6>Une journée pour apprendre et découvrir</h6>
		</header>

		<!-- description de la section--->
		<div class="div">
			<p>
				Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
				est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
				de développement des compétences tout au long de la vie.
			</p>
		</div>
	</section>

	<section class="section display--row display--between-x">
		<header class="header title--main">
			<h2>
				Ateliers<br />et conférences
				<span ></span>
			</h2>

			<h6>Comprendre le monde de demain</h6>
		</header>

		<div class="div">
			<p>
				Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
				est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
				de développement des compétences tout au long de la vie.
			</p>
		</div>
	</section>


	<!-- === SELECTION DES ATELIERS === -->

	<section class="section bg--gradient padding--y-xb">
		<div class="div size--w100 bg--white">

			<!-- filter bar -->
			<header class="header structure--filter-bar">
				<form id="article-filter" class="form">

					<!-- Searchbar -->
					<div class="div">
						<input id="searchbar" type="text" name="search" placeholder="Rechercher un atelier">
					</div>

					<!-- Filtres -->
					<div class="div button--filter">
						<input type="checkbox" name="all" id="all" data-filter="*" class="is-checked" selected>
						<label for="all">Tous</label>

						<input type="checkbox" name="jeunesse" id="jeunesse" data-filter=".jeunesse">
						<label for="jeunesse">Jeunesse</label>

						<input type="checkbox" name="conference" id="conference" data-filter=".conference">
						<label for="conference">Conférences</label>

						<input type="checkbox" name="environnement" id="environnement" data-filter=".environnement">
						<label for="environnement">Environnement</label>
					</div>
				</form>
			</header>

			<!-- Liste des articles -->
			<div class="div grid card--gallerie card--gallerie-2 card--gallerie-sm-2 card--gallerie-md-2 padding--m">
				<?php foreach($events as $event) :
					get_template_part( 'template-parts/event-card', null, array(
						'id' => $event['ID'],
						'image' => $event['logo']->publicUrl,
						'title' => $event['post_title'],
						'categories' => $event['categoriesTag'][0],
						'date' => $event['startDate'],
						'small_content' => $event['description']
						));
				endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer() ?>
