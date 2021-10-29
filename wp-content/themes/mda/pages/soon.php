<?php

/**
 * Template Name: Bientôt
 *
 * @package mda
 */

//set locale
setlocale (LC_TIME, 'fr_FR.utf8','fra');
// setlocale(LC_TIME, 'fr_FR.UTF8');
// setlocale(LC_TIME, 'fr_FR');
// setlocale(LC_TIME, 'fr');
// setlocale(LC_TIME, 'fra_fra');

$date = get_field('date_festival');
$start = str_replace('/', '-', $date['start_date']);
$first = date('d', strtotime($start));
$end = str_replace('/', '-', $date['end_date']);
$last = date('d', strtotime($end));
$month = strftime('%B', strtotime($start));
$year = date('Y', strtotime($start));

$image_id = get_field('bg_img');
if(!empty($image_id)) {
	$bg = wp_get_attachment_url($image_id);
}
$bilan_year = get_field('bilan')['last_year'];
$bilan_link = get_field('bilan')['link'];
$form_link = get_field('form_soon');

// var_dump(get_field('bilan'));

get_header();
?>

    <main id="primary" class="container-main soon">

        <section class="container soon" style="background-image: url('<?=$bg?>');">
            <div class="container infos heading-hero">
                <h1 class="_title">Le Festival de l'Apprendre revient bientôt...</h1>
                <span class="_dotted-border">
                    <!-- bordure --></span>
                <h2 class="_subtitle">du <?=$first?> au <?=$last?> <?=$month?> <?=$year?></h2>
            </div>

            <div class="container infos">
                <div class="formulaire">
                    <h3>Construisons ensemble votre Festival de l’Apprendre <?=$year?>&nbsp;!</h3>
                    <a href="<?=$form_link?>" class="btn-link">Je partage mes envies et mes idées</a>
                </div>
            </div>

            <div class="container infos">
                <div>
                    <a href="<?=$bilan_link?>" target="_blank" class="btn btn-link">Bilan de l'année <?=$bilan_year?></a>
                </div>
            </div>
        </section>

    </main>

<?php
get_footer();