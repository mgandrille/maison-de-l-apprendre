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

// $categories = explode(', ', mb_strtoupper($event['categories']);
// d($categories);

/**
 * Conversion for all time/date
 */
$startTime = new DateTime($event['startDate']);
$endTime = new DateTime($event['endDate']);
// Get the start date of the event
$date = date_format($startTime, 'd/m/Y');
// Get the start time of the event
$time = date_format($endTime, 'H:i');
// Get the duration of the event
$duree = $endTime->getTimestamp() - $startTime->getTimestamp();
$duree = date('H:i', $duree);

/**
 * Get all events for making a search in categories
 */
// $totalEvents = get_all_posts_infos();
// d($totalEvents);
// foreach($totalEvents as $totalEvent) {
// 	$totalEvent_categories = explode(', ', mb_strtoupper($totalEvent['categories']['tag']));
// 	foreach($totalEvent_categories as $totalEvent_category) {
// 		$result = array_search($totalEvent_category, $categories);
// 		d($result);
// 	}
// }



?>

<article id="post-<?php the_ID(); ?>">

	<header class="title--article">
		<?php
		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );
			the_title( '<p>', '</p>' );
		else :
			the_title( '<h2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>

	<section class="display--row display--between-x">
		<div class="structure--article-content" >

			<header class="card--legend-article">
				<img src="<?=$event['banner']->publicUrl?>" alt="banniere-atelier">
				<ul>
					<li>Début : <?=$date?></li>
					<li>Durée : <?=$duree?></li>
					<li><?=$event['categories']?></li>
				</ul>
			</header>

			<div>
				<h2>Au programme</h2>

				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mda' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				?>
				
			</div>	
		</div>


		<aside class="structure--article-aside">
			<div>
				<header class="title--secondary">
					<h3>Parcours</h3>
					<span></span>
				</header>

				<p>Les événements à suivre après cet atelier</p>
			</div>

			<div>
				<header class="title--secondary">
					<h3>Intervenants</h3>
					<span></span>
				</header>

				<p><?=$event['presta']?></p>
				<a href="<?=$event['web_site_presta']?>"><?=$event['web_site_presta']?></a>
			</div>

			<div class="card--absolute">
				<nav>
					<iframe id="haWidget" allowtransparency="true" src="<?=$event['widgetButtonUrl']?>" style="width: 100%; height: 70px; border: none;"></iframe>
				</nav>
			</div>
		</aside>
	</section>

<section class="margin--b-none margin--t-m" style="background-image: url('<?=content_url()?>/themes/mda/img/bg-atelier-similaires.png'); background-position: top top; background-repeat: no-repeat; background-size:contain">
	<header class="title--main-simple">
		<h2>
			Ateliers<br />
			similaires
			<span></span>
		</h2>
	</header>

		<div class="card--gallerie card--gallerie-2 card--gallerie-sm-2 card--gallerie-md-2 padding--m">
			<!-- <article class="card--card display--overflow-hidden padding--s-children bg--white-pure">
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
			</article> -->
		</div>

	</section>
</article>
