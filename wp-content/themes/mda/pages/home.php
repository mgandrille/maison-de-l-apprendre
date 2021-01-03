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

// Get all categories for the search bar
$categories = (array) get_categories();
$categoryTags = [];
foreach($categories as $category) {
	if($category->term_id !== 1) {
		array_push($categoryTags, $category);
	}
}


//add header section
get_header();
?>

<!-- === HERO LANDING === -->

<main class="container-main">
	<section class="container wrapper-hero">

		<!-- Titre -->
		<header class="heading-hero">
			<span class="_dotted-border"><!-- bordure --></span>

			<h2 class="_subtitle">du 24 au 31 janvier 2021</h2>
			<h1 class="_title">festival de<br>l'apprendre</h1>
			<h2 class="_subtitle">Prendre soin de soi, des autres<br />et de la planète</h2>

			<span class="_dotted-border"><!-- bordure --></span>
		</header>

		<!-- Badges circulaires 
		<div class="wrapper-badges">
			<div class="wrapper shape-badge-b">
				<span>Découvrir</span>
			</div>

			<div class="wrapper shape-badge-m">
				<span>Rencontrer</span>
			</div>

			<div class="wrapper shape-badge-m">
				<span>Expérimenter</span>
			</div>
		</div>
		-->
	</section>

	


	<!-- === PRESENTATION === -->

	<section class="container-row wrapper-section-presentation">

		<!-- Titre de la section --->
		<header class="heading-section">
			<h2 class="_title">
				Découvrir<br />le festival
				<span class="_dotted-border"><!-- bordure --></span>
			</h2>

			<h6 class="_subtitle">Une journée pour apprendre et découvrir</h6>
		</header>

		<!-- description de la section--->
		<div class="_paragraphe">
			<p>
				Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
				est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
				de développement des compétences tout au long de la vie.
			</p>
		</div>
	</section>

	<section class="container-row wrapper-section-presentation">
		<header class="heading-section">
			<h2 class="_title">
				Ateliers et<br /> conférences
				<span class="_dotted-border"></span>
			</h2>

			<h6 class="_subtitle">Comprendre le monde de demain</h6>
		</header>

		<div class="_paragraphe">
			<p>
				Première édition sur le territoire lyonnais, cette manifestation est impulsée par La Maison de l'Apprendre dont le rôle 
				est de fédérer un réseau territorial d'acteurs pour répondre, ensemble, aux enjeux actuels et futurs d'apprentissage et 
				de développement des compétences tout au long de la vie.
			</p>
		</div>
	</section>


	<!-- === SELECTION DES ATELIERS === -->

	<section class="container bg-gradient">
		<div class="wrapper">

			<!-- filter bar -->
			<header class="wrapper-row wrapper-filter-bar">
				<form id="article-filter" class="_body">

					<!-- Searchbar -->
					<div class="_searchbar">
						<input id="searchbar" type="text" name="search" placeholder="Rechercher un atelier">
					</div>

					<!-- Filtres -->
					<div class="_filters button--filter">
						<div>
							<input type="checkbox" name="all" id="all" data-filter="*" class="is-checked" selected>
							<label for="all">Tous</label>
						</div>

						<?php foreach($categoryTags as $tag) : ?>
							<div>
								<input type="checkbox" name="<?=$tag->name?>" id="<?=$tag->name?>" data-filter=".<?=$tag->name?>">
								<label for="<?=$tag->name?>"><?=strtoupper($tag->name)?></label>
							</div>
						<?php endforeach; ?>
					</div>
				</form>
			</header> 

			<!-- Liste des articles -->
			<div class="grid" style="display: flex; flex-wrap: wrap">
				<?php foreach($events as $event) :
					get_template_part( 'template-parts/event-card', null, array(
						'id' => $event['ID'],
						'image' => $event['logo']->publicUrl,
						'title' => $event['post_title'],
						'categories' =>$event['categoriesTag'],
						'date' => $event['startDate'],
						'small_content' => substr($event['description'], 0, 110) . "..."
						));
				endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();