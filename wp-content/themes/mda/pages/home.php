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

			<h2 class="_subtitle">du 21 au 27 janvier 2021</h2>
			<h1 class="_title">festival de<br>l'apprendre</h1>
			<h2 class="_subtitle">en famille, entre collègues, entre amis,<br />venez fêter le plaisir d'apprendre</h2>

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
		<div class="paragraphe">
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

		<div class="paragraphe">
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

						<?php foreach($categoryTags as $tag) : ?>
							<input type="checkbox" name="<?=$tag->slug?>" id="<?=$tag->slug?>" data-filter=".<?=$tag->slug?>">
							<label for="<?=$tag->slug?>"><?=strtoupper($tag->name)?></label>
						<?php endforeach; ?>
					</div>
				</form>
			</header>

			<!-- Liste des articles -->
			<div class="div grid card--gallerie">
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

<?php
get_footer();