<?php
/**
 * Template part for displaying events/articles in the main page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */


$id = $args['id'];

$public = get_field('event_public', $id);
$type = get_field('event_type', $id);
$theme = get_field('event_theme', $id);
$date = get_field('event_date', $id);
$time = new DateTime(get_field('event_hour', $id));
$time = date_format($time, 'H:i');
$duree = new DateTime(get_field('event_lasts', $id));
$duree = date_format($duree, 'H:i');
$materiel = get_field('material', $id);
$intervenant = get_field('guest_name', $id);
$siteWeb = get_field('guest_web', $id);
$replay = get_field('', $id);
$helloAsso = get_field('ha_link', $id);

if(!empty($helloAsso)) {
	$events = get_articles();
	foreach ($events as $event) {
		if($event['url'] == $helloAsso) {
			$banner = $event['banner']->publicUrl;
		}
	}
} else {
	$banner = get_the_post_thumbnail_url($id);
}


?>

<article class="grid-item wrapper wrap-card <?=$type?> <?=$public?>" data-category="<?=$type?>" data-date="<?=$date?>" onclick="location.href='<?php echo get_permalink($args['id'])?>'">
    <div class="wrapper-row _body  display-end-x text-right text-warm">
        <p class="padding-y-none" style="padding-top:0;padding-bottom:0;font-size:.90rem;text-transform:uppercase"><?= $public .' , '. $type ?></p>
    </div>

    <header class="_head" style="background-image: url('<?=$banner?>');">
        <!-- header img -->
    </header>

    <div class="wrapper _body">
        <header class="_head">
            <ul class="list-row">
                <li>Date : <?=$date?></li>
                <li>Début : <?=$time?> H</li>
            </ul>
        </header>

        <p class="text-grey" style="font-size: .90rem; margin-bottom: 0; padding-bottom: 0"><?=$args['intervenant']?></p>
        <h3 class="_title"> <?=get_the_title($id)?> </h3>

        <p class="_paragraphe"> <?=get_the_excerpt($id)?> </p>
    </div>

    <footer class="wrapper-row _foot display-end-x">
        <button class="btn-s btn-seemore" onclick="location.href='<?php echo get_permalink($args['id'])?>'">
		Voir l'évenement
		</button>
    </footer>
</article>

