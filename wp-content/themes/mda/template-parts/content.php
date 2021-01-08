<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */


/**
 * get all information in an array ($event) for one article
 */
$event = get_post_infos();
// d($event);

$jsonData = get_json_data();
foreach($jsonData as $data) {
	// d($data);
	if($data->HelloAsso == $event['post_name']) {
		$content = $data->detail;
		$intervenant = $data->structure;
		$siteWeb = $data->site_web;
		$duree = $data->duree;
		$type = $data->type;
		$public = $data->public;
	}
}

/**
 * Conversion for all time/date
 */
$startTime = new DateTime($event['startDate']);
$endTime = new DateTime($event['endDate']);
// Get the start date of the event
$date = date_format($startTime, 'd/m/Y');

// Get the start time of the event
$time = date_format($endTime, 'H:i');

/**
 * Get all events for making a search in categories
 */
$categories = $event['categoriesTag'];

$totalEvents = get_all_posts_infos();
$datas = [];
foreach ($totalEvents as $totalEvent) {
	$result = array_diff($totalEvent['categoriesTag'], $categories);
	if (count($result) <= 1) {
		array_push($datas, $totalEvent);
	}
}



?>

<article class="container" id="post-<?php the_ID(); ?>">

	<header class="wrapper heading-article margin-bottom-m">
		<h1 class="_title">
			<?= $event['title'] ?>
		</h1>

		<h2 class="_subtitle">
			<?= $public .' , '. $type ?>
		</h2>
	</header>

	<section class="wrapper">
		<header class="card-legended">
			<img class="img" src="<?= $event['banner']->publicUrl ?>" alt="banniere-atelier">

			<ul class="wrapper-row">
				<li>Date : <?= $date ?></li>
				<li>Début : <?= $time ?></li>
				<li>Durée : <?= $duree ?></li>
				<li><?= $public .' , '. $type ?></li>
			</ul>
		</header>
	</section>

	<section class="wrapper-row display-wrap display-nowrap-md">
		<div>
			<h2>Au programme</h2>

			<?= nl2br($content); ?>
		</div>

		<aside class="wrapper-aside display-flex">
			<div class="wrapper wrapper-aside-section">
				<header class="heading-simple">
					<h3 class="_title">Intervenants</h3>
					<span class="_dotted-border">
						<!-- bordure -->
					</span>
				</header>

				<div class="_paragraphe">
					<p><?= $intervenant ?></p>
					<a href="<?= $siteWeb ?>"><?= $siteWeb ?></a>
				</div>
			</div>
		</aside>
	</section>

	<section class="wrapper margin-bottom-xb">
		<h2>S'inscrire</h2>
		<iframe id="haWidget" allowtransparency="true" scrolling="auto" src="<?= $event['widgetFullUrl'] ?>" style="width: 100%; height: 750px; border: none;" onload="window.scroll(0, this.offsetTop)"></iframe>
	</section>

	<section class="wrapper margin-bottom-xb">
		<header class="heading-section">
			<h2 class="_title"> Ateliers<br /> similaires
				<span class="_dotted-border"></span>
			</h2>
		</header>
	</section>

	<section class="wrapper bg-gradient">
		<div class="grid" style="display: flex; flex-wrap: wrap">
			<?php foreach ($datas as $data) :
				if (is_array($data) && ($event['post_title'] !== $data['post_title'])) :
					get_template_part('template-parts/event-card', null, array(
						'id' => $data['ID'],
						'image' => $data['logo']->publicUrl,
						'title' => $data['post_title'],
						'categories' => $event['categoriesTag'],
						'categoriesSlug' => $event['categoriesTagSlug'],
						'date' => $data['startDate'],
						'small_content' => substr($event['description'], 0, 110) . "...",
					));
				endif;
			endforeach;	?>
		</div>
	</section>
</article>