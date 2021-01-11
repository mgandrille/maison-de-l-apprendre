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
foreach ($categories as $category) {
	if ($category->term_id !== 1) {
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
			<span class="_dotted-border">
				<!-- bordure --></span>

			<h2 class="_subtitle">du 24 au 31 janvier 2021</h2>
			<h1 class="_title">festival de<br>l'apprendre</h1>
			<h2 class="_subtitle">Prendre soin de soi, des autres<br />et de la planète</h2>

			<span class="_dotted-border">
				<!-- bordure --></span>
		</header>
	</section>


	<!-- === PRESENTATION === -->

	<section class="container-row wrapper-section-presentation">

		<!-- Titre de la section --->
		<header class="heading-section">
			<h2 class="_title">
				Découvrir<br />le festival
				<span class="_dotted-border">
					<!-- bordure --></span>
			</h2>

			<h6 class="_subtitle">Une semaine pour apprendre et découvrir</h6>
		</header>

		<!-- description de la section--->
		<div class="_paragraphe">
			<h4>Festival de l’Apprendre : de quoi s’agit-il ?</h4>

			<p>
				L’intention du festival de l’Apprendre est un temps fort organisé partout en France pour célébrer tous les apprentissages, 
				tous les acteurs et tous les lieux qui les permettent dans chaque territoire.
			</p>

			<p>
				Une telle fête pourra se déployer progressivement sur tout le territoire français, comme la fête de la musique qui encourage chacun
				à participer à sa manière et selon ses goûts, impliquant les acteurs institutionnels, les collectivités, les entreprises, les associations 
				et les familles pour impulser des échanges intergénérationnels afin que tous puissent progresser et bénéficier de la société apprenante.
			</p>

			<p>
				​Le but d’un tel événement ? Célébrer la diversité et la continuité des apprentissages ! Face aux défis sociaux, environnementaux et
				économiques, nous invitons chacun.es à être acteur de sa vie et d’une société durable par le développement du pouvoir d’apprendre !
			</p>

			<div class="wrapper-row display-end-x"  style="column-gap: 20px;">
				<button class="btn btn-link">
					<a href="https://drive.google.com/file/d/1CXhFuykV5iDVa5lgv9sBQSMHdMvkO1xm/view?usp=sharing" target="_blank">Voir notre bilan 2020</a>
				</button>

				<button class="btn btn-link">
					<a href="https://drive.google.com/file/d/1gAbBeVFWeAFt_6u1SB_LVRJal9krLq4B/view" target="_blank">Voir notre dossier de presse</a>
				</button>
			</div>
		</div>
	</section>

	<section class="container-row wrapper-section-presentation margin-bottom-xb">
		<header class="heading-section">
			<h2 class="_title">
				Ateliers et<br /> conférences
				<span class="_dotted-border"></span>
			</h2>

			<h6 class="_subtitle">Comprendre et agir pour le monde de demain</h6>
		</header>

		<div class="_paragraphe">
			<h4>Comment y prendre part ?</h4>

			<p>
				Chaque année,  la Maison de l’Apprendre invite les acteurs du territoire lyonnais à prendre part au Festival de l’Apprendre.
				Associations, entreprises, collectivités, établissement scolaire ou d’enseignement supérieur, toutes les structures agissant pour le développement des talents 
				et la transmission des compétences sont bienvenues.
			</p>

			<p>
				​Ateliers découvertes, forum des initiatives, conférences, portes ouvertes, visites… Le Festival de l’Apprendre revêt différents formats, selon ce qui convient 
				à chacun. Un Appel à Manifestation d’Intérêt est organisé au mois de novembre précédent pour recueillir les propositions des acteurs du territoire. 
				​La sélection est effectuée avant la fin de l’année  par un Comité d’Ambassadeurs représentatifs du continuum éducatif, de la petite enfance à la formation 
				professionnelle, en passant par le monde scolaire ou encore de l’éducation populaire.
			</p>

			<p>
				Cet évènement fédérateur et ouvert au grand public se déroule chaque année entre le 24 et le 31 Janvier.	
			</p>
		</div>
	</section>

	<section class="container-row padding-s-y display-center-y display-between-x border-y-light">
		<header class="display-flex display-center-y" style="column-gap: 20px;">
			<i class="fas fa-calendar-check text-m display-flex display-center-y" style="align-items: center;"></i>
			<h2>Réservez vos ateliers dès maintenant</h2>
		</header>

		<button class="btn btn-display-content">
			<a href="https://www.canva.com/design/DAESc4bVShQ/2yq6WbyIGD1sVdSO907yOQ/view?utm_content=DAESc4bVShQ&utm_campaign=designshare&utm_medium=link&utm_source=sharebutton" target="_blank">Programme</a>
		</button>
	</section>
	
	<section class="container-row padding-y display-center-y">
		<header class="wrapper-row wrapper-filter-bar display-center-y" style="padding: unset; height: unset; justify-content: unset">
			<form id="article-filter" class="_body">

				<!-- Searchbar -->
				<div class="_searchbar">
					<input id="searchbar" type="text" name="search" placeholder="Rechercher un atelier">
				</div>

				<!-- Filtres -->
				<div class="_filters button--filter display-between-x">

					<div>
						<label for="date">Choisir une date</label>
						<input type="date" id="date" name="date" min="2021-01-24" max="2021-01-31">
						<span id="reset-btn" class="display-none"><i class="fas fa-times"></i></span>
					</div>
					
					<div class="display-flex display-between-x">
						<?php foreach ($categoryTags as $tag) : ?>
							<div>
								<input type="checkbox" name="<?= $tag->slug ?>" id="<?= $tag->slug ?>" data-filter=".<?= $tag->slug ?>">
								<label class="text-uppercase" for="<?= $tag->slug ?>"><?= strtoupper($tag->name) ?></label>
							</div>
						<?php endforeach; ?>
					</div>
					
				</div>
			</form>
		</header>
	</section>

	<!-- === SELECTION DES ATELIERS === -->

	<section class="container bg-gradient">
		<div class="wrapper">

			<!-- Liste des articles -->
			
			<!--<p class="text-m text-grey padding-y-m">Les ateliers sont en cours d'élaboration, ils seront disponibles bientôt !</p>-->

			<div class="grid" style="display: flex; flex-wrap: wrap">
				<?php foreach ($events as $event) :
					get_template_part('template-parts/event-card', null, array(
						'id' => $event['ID'],
						'image' => $event['logo']->publicUrl,
						'title' => $event['post_title'],
						'categories' => $event['categoriesTag'],
						'categoriesSlug' => $event['categoriesTagSlug'],
						'date' => $event['startDate'],
						'small_content' => substr($event['description'], 0, 110) . "..."
					));
				endforeach; ?>
			</div>
		</div>
	</section>

	<section class="container-row wrapper-section-presentation margin-top-xb margin-bottom-xb">
		<header class="heading-section">
			<h2 class="_title">
				Learning Planet<br /> Festival
				<span class="_dotted-border"></span>
			</h2>

			<h6 class="_subtitle">Inspirer les apprenants</h6>
		</header>

		<div class="_paragraphe">
			<h4>En savoir plus sur Learning Planet</h4>

			<p>
				Le Festival de l’Apprendre s’inscrit dans la dynamique Learning Planet impulsée par le Centre de Recherches Interdisciplinaire et l’Unesco.
			</p>

			<p>
				LearningPlanet est un collectif ouvert qui s’est donné pour mission d’inspirer les apprenants de tous âges et de leur donner les moyens de 
				contribuer à faire face aux défis sociétaux et environnementaux. De nouvelles manières d’apprendre, d’enseigner, de faire de la recherche et 
				de mobiliser l’intelligence collective sont nécessaires pour cela.
			</p>

			<p>
				Avec l’aide de nos partenaires internationaux, nous identifions, développons et amplifions les approches les plus innovantes permettant 
				de résoudre collectivement les problèmes complexes, locaux et globaux, comme les Objectifs de développement durable (ODD).	
			</p>

			<div class="wrapper-row display-end-x" style="column-gap: 20px;">
				<button class="btn btn-link">
					<a href="https://learning-planet.org/fr" target="_blank">Le site de Learning Planet</a>
				</button>
			</div>
		</div>
	</section>

	<section class="container-row display-between-x display-center-y bg-main text-white padding-m">
		<p style="width: auto;">
			Le Festival de l'Apprendre se renouvelle grâce au soutien de celles et ceux qui y prennent part.</br>
			Vous souhaitez soutenir l'action de la Maison de l'Apprendre ? Partagez-nous votre don et retrouvons-nous lors du prochain Festival !
		</p>

		<iframe id="haWidget" allowtransparency="true" src="https://www.helloasso.com/associations/la-maison-de-l-apprendre/formulaires/1/widget-bouton" style="width:auto;height:70px;border:none;"></iframe>
	</section>
</main>

<?php
get_footer();
