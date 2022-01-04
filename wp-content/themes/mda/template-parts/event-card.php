<?php
/**
 * Template part for displaying events/articles in the main page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */


$id = $args['id'];

$public = wp_get_post_terms($id, 'public')[0]->name;
$type = wp_get_post_terms($id, 'types')[0]->name;
$theme = wp_get_post_terms($id, 'theme');  // Array []->name
$modalité =  get_field('event_mode', $id);
$date = get_field('event_date', $id);
if(strpos($date, '-')) {
	$date = new DateTime($date);
	$date = date_format($date, 'd/m/Y');
}
$time = new DateTime(get_field('event_hour', $id));
$time = date_format($time, 'H:i');
$duree = new DateTime(get_field('event_lasts', $id));
$duree = date_format($duree, 'H:i');
$materiel = get_field('material', $id);
$intervenant = get_field('guest_name', $id);
$siteWeb = get_field('guest_web', $id);
$replay = get_field('', $id);
$helloAsso = get_field('ha_link', $id);
$vignette = get_the_post_thumbnail_url($id);


$taxonomies = get_object_taxonomies( array( 'post_type' => 'events' ) );
foreach( $taxonomies as $taxonomy ) {
    $terms = get_terms( $taxonomy );
    foreach($terms as $term) {
        if($term->name === $type ) {
            $typeSlug = $term->slug;
        }
        if($term->name === $public ) {
            $publicSlug = $term->slug;
        }
    }
}

?>

<article class="grid-item wrapper wrap-card <?=$typeSlug?> <?=$publicSlug?>" data-category="<?=$typeSlug?>" data-date="<?=$date?>" onclick="location.href='<?php echo get_permalink($args['id'])?>'">
    <div class="wrapper-row _body  display-between-x text-right text-warm">
        <img class="img _modalite" src="<?=get_template_directory_uri()?>/img/<?=$modalité?>.png" alt="évènement en <?=$modalité?>">
        <p class="padding-y-none margin-bottom-none" style="padding-top:0;padding-bottom:0;font-size:.90rem;text-transform:uppercase"><?= $public .' , '. $type ?></p>
    </div>

    <header class="_head" style="background-image: url('<?=$vignette?>');">
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

