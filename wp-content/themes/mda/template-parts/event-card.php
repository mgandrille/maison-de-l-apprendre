<?php
/**
 * Template part for displaying events/articles in the main page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mda
 */

$date = date_format(new DateTime($args['date']), 'd/m/Y');
$time = date_format(new DateTime($args['date']), 'H:i');


// Get the duration of the event
//$duree = $endTime->getTimestamp() - $startTime->getTimestamp();
//$duree = date('H:i', $duree);


?>

<article class="grid-item wrapper wrap-card <?=$args['categoriesSlug'][0]?> <?=$args['categoriesSlug'][1]?>" data-category="<?=$args['categoriesSlug'][0]?>" data-date="<?=$date?>" onclick="location.href='<?php echo get_permalink($args['id'])?>'">
    <div class="wrapper-row _body  display-end-x text-right text-warm">
        <p class="padding-y-none" style="padding-top:0;padding-bottom:0; font-size: .90rem; text-transform: uppercase"><?= implode(", ",  $args['categories'])?> </p>
    </div>
    
    <header class="_head" style="background-image: url('<?=$args['image'];?>');">
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
        <h3 class="_title"> <?=$args['title']?> </h3>

        <p class="_paragraphe"> <?=substr($args['small_content'], 0, 110) . "..."?> </p>
    </div>

    <footer class="wrapper-row _foot display-end-x">
        <button class="btn-s btn-seemore" onclick="location.href='<?php echo get_permalink($args['id'])?>'">
		Voir l'évenement
		</button>
    </footer>
</article>

