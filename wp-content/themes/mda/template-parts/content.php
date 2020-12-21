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
$categories = $event['categoriesTag'];

$totalEvents = get_all_posts_infos();
$datas = [];
foreach($totalEvents as $totalEvent) {
	$result = array_diff($totalEvent['categoriesTag'], $categories);
	if(count($result) <= 1 ) {
		array_push($datas, $totalEvent);
	}
}



?>

<article class="container" id="post-<?php the_ID(); ?>">

	<header class="heading-article">
		<?php
		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );
			the_title( '<p>', '</p>' );
		else :
			the_title( '<h2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>

	<section class="container-row">
		<div class="container-article" >
			<header class="card-legended">
				<img class="img" src="<?=$event['banner']->publicUrl?>" alt="banniere-atelier">

				<ul class="wrapper-row">
					<li>Date : <?=$date?></li>
					<li>Début : <?=$duree?></li>
					<li><?=implode(', ', $event['categoriesTag'])?></li>
				</ul>
			</header>

			<div class="container">
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


		<aside class="container-aside">
			<div class="wrapper">
				<header class="heading-simple">
					<h3>Parcours</h3>
					<span></span>
				</header>

				<p>Les événements à suivre après cet atelier</p>
			</div>

			<div class="wrapper">
				<header class="heading-simple">
					<h3>Intervenants</h3>
					<span></span>
				</header>

				<p><?=$event['presta']?></p>
				<a href="<?=$event['web_site_presta']?>"><?=$event['web_site_presta']?></a>
			</div>
		</aside>
	</section>
	
	<section class="container">		
		<h2>S'inscrire</h2>
	</section>

	<section class="wrapper">
		<iframe id="haWidget" allowtransparency="true" scrolling="auto" src="<?=$event['widgetFullUrl']?>" style="width: 100%; height: 750px; border: none;" onload="window.scroll(0, this.offsetTop)"></iframe>
	</section>

	<section class="container">
		<header class="heading-section">
			<span class="_dotted"></span>
			<h2 class="_title"> Ateliers<br /> similaires </h2>
		</header>

		<div class="card-gallerie">
			<?php foreach($datas as $data) :
				if(is_array($data) && ($event['post_title'] !== $data['post_title'])) :
					get_template_part( 'template-parts/event-card', null, array(
						'id' => $data['ID'],
						'image' => $data['logo']->publicUrl,
						'title' => $data['post_title'],
						'categories' => $event['categoriesTag'][0],
						'date' => $data['startDate'],
						'small_content' => $data['description'],
						));
				endif;
			endforeach;	?>
		</div>
	</section>
</article>
