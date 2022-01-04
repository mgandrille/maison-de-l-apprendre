<?php

/**
 * Get all Events (cpt)
 */
$args = array(
	'post_type' => 'events',
	'posts_per_page' => -1,
	'orderby' => 'rand'
);
$all_events = new WP_Query($args);

$year = get_field('festival_year', $post->ID);
// d($year);

$taxonomies = get_object_taxonomies( array( 'post_type' => 'events' ) );
foreach( $taxonomies as $taxonomy ) {
    if($taxonomy === 'types' || $taxonomy === 'public') {
        $terms = get_terms( $taxonomy );
        foreach($terms as $term) {
            // if(strpos($term_name, '&amp;'))
            $categoryTags[$term->slug] = $term->name;
        }
    }
}

?>

<section class="container-row padding-y display-center-y">
    <header class="wrapper-row wrapper-filter-bar display-center-y" style="padding: unset; height: unset; justify-content: unset">
        <form id="article-filter" class="_body">

            <!-- Searchbar -->
            <div class="_searchbar width-100 width-auto-1024">
                <input class="width-100 width-auto-1024" id="searchbar" type="text" name="search" placeholder="Rechercher un atelier">
            </div>

            <!-- Filtres -->
            <div class="_filters button--filter display-center-x display-between-x-1024 width-100 width-auto-1024">

                <div class="width-100 width-auto-1024">
                    <label for="date">Choisir une date</label>
                    <input type="date" id="date" name="date" min="2022-01-24" max="2022-01-31">
                    <span id="reset-btn" class="display-none"><i class="fas fa-times"></i></span>
                </div>

                <div class="display-flex display-between-x display-wrap display-nowrap-800">
                    <?php foreach ($categoryTags as $slug => $tag) : ?>
                        <div class="width-100 width-auto-800">
                            <input type="checkbox" name="<?= $slug ?>" id="<?= $slug ?>" data-filter=".<?= $slug ?>" value=".<?= $slug ?>">
                            <label class="text-uppercase" for="<?= $slug ?>"><?= strtoupper($tag) ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
    </header>
</section>




<!-- === SELECTION DES ATELIERS === -->

<section class="wrapper bg-gradient">
    <div class="grid" style="display: flex; flex-wrap: wrap;">
        <?php
        if($all_events->have_posts()) :
            while ( $all_events->have_posts() ) : $all_events->the_post();
                $post_date = get_field('event_date', $post->ID);
                $post_year = strtotime(str_replace('/', '-',$post_date));
                $post_year = date('Y', $post_year);

                if ($post->ID !== $the_actual_post_id && $post_year === $year) :
                    get_template_part('template-parts/event-card', null, array(
                        'id' => $post->ID,
                        // 'year' => $year,
                    ));
                endif;
            endwhile;
        endif; ?>
    </div>
</section>


<?php
wp_reset_query();