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
$categories = explode(', ', mb_strtoupper($event['categories']));
// d($categories);

$totalEvents = get_all_posts_infos();
$datas = array();
foreach($totalEvents as $totalEvent) {
	$totalEvent_categories = explode(', ', mb_strtoupper($totalEvent['categories']));

	$result = array_diff($totalEvent_categories, $categories);
	if(count($result) <= 1 ) {
		$datas[] = array_push($datas, $totalEvent);
	}
}
// d($datas);



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
			<?php foreach($datas as $data) :
				if(is_array($data) && ($event['post_title'] !== $data['post_title'])) :
					get_template_part( 'template-parts/event-card', null, array(
						'id' => $data['ID'],
						'image' => $data['logo']->publicUrl,
						'title' => $data['post_title'],
						'categories'  => $data['categories'],
						'date' => $data['startDate'],
						'small_content' => $data['description'],
						));
				endif;
			endforeach;	?>
		</div>

	</section>
</article>
