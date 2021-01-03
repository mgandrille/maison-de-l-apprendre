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
?>

<article class="grid-item wrapper wrap-card <?$args['categoriesSlug'][0]?> <?=$args['categoriesSlug'][1]?>" data-category="<?=$args['categoriesSlug'][0]?>">
    <header class="_head" style="background-image: url('<?=$args['image'];?>');">
        <!-- header img -->
    </header>

    <div class="wrapper _body">
        <header class="_head">
            <ul class="list-row">
                <li>Date : <?=$date?></li>
                <li>Début : <?=$time?></li>
                <li><?= implode(", ",  $args['categories'])?></li>
            </ul>
        </header>

        <h3 class="_title"> <?=$args['title']?> </h3>

        <p class="_paragraphe"> <?=$args['small_content']?> </p>
    </div>

    <footer class="wrapper _foot">
        <a href="<?php echo get_permalink($args['id'])?>">Voir l'atelier</a>
    </footer>
</article>

