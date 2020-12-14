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


<article class="grid-item <?=$args['categories']?> card--card display--overflow-hidden padding--s-children bg--white-pure" data-category="<?=$args['categories']?>">
    <header class="size--h20 card--bg structure--head" style="background-image: url('<?=$args['image'];?>');"></header>
    <div class="structure--body">
        <ul class="card--tag">
            <li><?=$date?></li>
            <li><?=$time?></li>
            <li class="margin--m-l-auto"><?=$args['categories']?></li>
        </ul>

        <h3 class="position--relative size--w100 margin--m-b-s title--h4">
            <span class="position--xy_ t-50 r-30 shape--elmt-border-dotted_ _main"></span>
            <?=$args['title']?>
        </h3>

        <p class="margin--m-t-none">
            Courte description <?=$args['small_content']?>
        </p>
    </div>
    <footer class="structure--foot display--end-y">
        <a class="button--btn" href="<?php echo get_permalink($args['id'])?>">Voir l'atelier</a>
    </footer>
</article>

