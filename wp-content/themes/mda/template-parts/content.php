<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

$the_actual_post_id = $post->ID;

$public = get_field('event_public');
$type = get_field('event_type');
$theme = get_field('event_theme');
$date = get_field('event_date');
$time = new DateTime(get_field('event_hour'));
$time = date_format($time, 'H:i');
$duree = new DateTime(get_field('event_lasts'));
$duree = date_format($duree, 'H:i');
$materiel = get_field('material');
$intervenant = get_field('guest_name');
$siteWeb = get_field('guest_web');
$replay = get_field('');
$helloAsso = get_field('ha_link');
if(!empty($helloAsso)) {
	$events = get_articles();
	foreach ($events as $event) {
		if($event['url'] == $helloAsso) {
			$banner = $event['banner']->publicUrl;
		}
	}
} else {
	$banner = get_the_post_thumbnail_url();
}

/**
 * Get all Events (cpt)
 */
$args = array(
	'post_type' => 'events',
	'posts_per_page' => -1,
	'orderby' => 'rand'
);
$all_events = new WP_Query($args);

?>

<article class="container" id="post-<?php the_ID(); ?>">

	<header class="wrapper heading-article margin-bottom-m">
		<h1 class="_title">
			<?= the_title() ?>
		</h1>

		<h2 class="_subtitle">
			<?= $public .' , '. $type ?>
		</h2>
	</header>

	<section class="wrapper margin-bottom-m">
		<header class="card-legended">
			<img class="img" src="<?=$banner?>" alt="banniere-atelier">

			<ul class="wrapper-row">
				<li>Date : <?= $date ?></li>
				<li>Début : <?= $time ?> H</li>
				<li>Durée : <?= $duree ?> H</li>
				<li><?= $public .' , '. $type ?></li>
			</ul>
		</header>
	</section>

	<section class="wrapper-row display-wrap display-nowrap-md">
		<div style="flex-grow: 2; flex-shrink: 1;">
			<h2>Au programme</h2>

			<?= the_content(); ?>
			<?php if(!empty($materiel) && $materiel != "-") : ?>
				<p>✅ Matériel nécessaire : <?= nl2br($materiel); ?></p>
			<?php endif; ?>

		</div>

		<aside class="wrapper-aside display-flex" style="flex: 1;">
			<div class="wrapper wrapper-aside-section">
				<header class="heading-simple">
					<h3 class="_title">Intervenant(s)</h3>
					<span class="_dotted-border">
						<!-- bordure -->
					</span>
				</header>

				<div class="_paragraphe">
					<p><?= $intervenant ?></p>
					<a href="<?= $siteWeb ?>" target="_blank"><?= $siteWeb ?></a>
				</div>
			</div>
		</aside>
	</section>

	<?php //d($replay); ?>

	<?php if($replay) : ?>
		<section class="wrapper margin-bottom-xb">
			<h2>Voir le replay</h2>
			<?php //the_content(); ?>
			<div style="text-align:center">
				<?= $replay; ?>
			</div>
		</section>
	<?php endif; ?>

	<section class="wrapper margin-bottom-xb">
		<header class="heading-section">
			<h2 class="_title"> Ateliers<br /> similaires
				<span class="_dotted-border"></span>
			</h2>
		</header>
	</section>

	<section class="wrapper bg-gradient">
		<div class="grid" style="display: flex; flex-wrap: wrap">
			<?php
			$year = strtotime(str_replace('/', '-',$date));
			$year = date('Y', $year);

			if($all_events->have_posts()) :
				while ( $all_events->have_posts() ) : $all_events->the_post();
					$post_date = get_field('event_date', $post->ID);
					$post_year = strtotime(str_replace('/', '-',$post_date));
					$post_year = date('Y', $post_year);

					if ($post->ID !== $the_actual_post_id && $post_year === $year) :
						get_template_part('template-parts/event-card', null, array(
							'id' => $post->ID,
							'year' => $year,
						));
					endif;
				endwhile;
			endif; ?>
		</div>
	</section>
</article>