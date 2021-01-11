<?php

/**
 * this function permits to add automatically posts
 */
function automatic_posts() {
    $posts = [];

    $articles = get_articles();
    foreach($articles as $article) {
        if(strpos($article['formSlug'], 'festival-de-l-apprendre-lyon-') !== false) {
            $slug = str_replace('festival-de-l-apprendre-lyon-', '', $article['formSlug']);
        } else {
            $slug = $article['formSlug'];
        }

        $values = array(
            'post_date'             => $article['meta']->createdAt,
            'post_content'          => $article['description'],
            'post_title'            => $article['title'],
            'post_name'             => $slug,
            'post_excerpt'          => '',
            'post_status'           => 'publish',
            'post_type'             => 'post',
            'comment_status'        => 'closed',
            'ping_status'           => 'closed',
            'post_modified'         => $article['meta']->updatedAt,
            // 'post_category'         => []
        );
        array_push($posts, $values);

    }
    // d($posts);

    $existingPosts = get_posts(['numberposts' => -1]);

    if(!empty($existingPosts)) {
        foreach($existingPosts as $existingPost) {
            $existingPostSlug[] =  $existingPost->post_name;
        };
    }
    // d($existingPosts, $existingPostSlug);
    if(!empty($posts)) {
        foreach($posts as $post) {
            if(!empty($existingPosts)) {  // si il existe des posts dans le BO
                if(!in_array($post['post_name'], $existingPostSlug)) {  // on vérifie que le slug de post n'existe pas dans le tableau des slugs existants dans le BO
                    wp_insert_post( $post );
                }
            } else {  // si il n'y a aucun post dans le BO
                wp_insert_post( $post );
            }
        };
    }
}

add_action('init', 'automatic_posts');



/**
 * get_api_key_helloAsso
 * function for having HelloAsso API Key
 *
 * @return array {'key', 'secret_key'}
 */
function get_api_key_helloAsso() {
    $options = get_posts(array(
        'post_type' => 'options_page',
        'numberposts' => -1,
    ));
    // d($options);

    $option_helloAsso = get_post($options[0]->ID);
    $helloAsso = get_post($option_helloAsso->ID);
    $helloAsso_vars = get_fields($helloAsso);

    return $helloAsso_vars;
}


/**
 * get_json_data
 *
 * @return $datas
 */
function get_json_data() {
    $jsonDatas = file_get_contents(content_url().'/themes/mda/inc/doc/datasCopie.json');
    $datas = json_decode($jsonDatas);
    return $datas;
}


/**
 * get_all_posts_infos
 *
 * @return array
 */
function get_all_posts_infos() {
	$articles = get_articles();  // events de HelloAsso
    $posts = get_posts(['numberposts' => -1]);
    $events = array();

    foreach($posts as $post) {
        // pour récupérer les catégories du post
        $categoryTags = get_the_category($post->ID);

        $post = (array) $post;

        // Tous les noms des catégories du post sont récupérés d'un coup sous forme de tableau
        $categorySlug = array_map(function($categorie) {
            return $categorie->slug;
        }, $categoryTags);

        $categoryNames = array_map(function($categorie) {
            return $categorie->name;
        }, $categoryTags);

        // J'ai ajouté un nouveau champ sur le post avec les catégories en valeur
        $post['categoriesTag'] = $categoryNames;
        $post['categoriesTagSlug'] = $categorySlug;

        // d($post);
        foreach($articles as $article) { // 84 articles
            if(strpos($article['formSlug'], 'festival-de-l-apprendre-lyon-') !== false) {
                $slug = str_replace('festival-de-l-apprendre-lyon-', '', $article['formSlug']);
            } else {
                $slug = $article['formSlug'];
            }
            // d($post['post_name'], $article['formSlug']);
            if($post['post_name'] == $slug) {
                // d($post, $article);
                $event = array_merge($post, $article);
                array_push($events, $event);  // 1tableau avec les 84events
            }
        }
    }
    // d($events);

	return $events;
}

/**
 * get_post_infos
 *
 * @return array
 */
function get_post_infos() {
    $articles = get_articles();
    $post = get_post();
    $event = (array) $post;

    // pour récupérer la catégorie du post
    $categoryTags = get_the_category($post->ID);
    // Tous les noms des catégories du post sont récupérés d'un coup sous forme de tableau
    $categoryNames = array_map(function($categorie) {
        return $categorie->name;
    }, $categoryTags);
    // J'ai ajouté un nouveau champ sur le post avec les catégories en valeur
    $event['categoriesTag'] = $categoryNames;

    foreach($articles as $article) {
        $add_fields = get_fields($event['ID']);
        if($add_fields) {
            $event = array_merge($event, $add_fields);
        }
        if(array_search($event['post_title'], $article)) {
            $event = array_merge($event, $article);
        }

    }

    return $event;
}