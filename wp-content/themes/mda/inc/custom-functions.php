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
            'post_category'=> []
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
            if(!empty($existingPosts)) {
                if(!in_array($post['post_name'], $existingPostSlug)) {
                    wp_insert_post( $post );
                }
            } else {
                wp_insert_post( $post );
            }
        };
    }
}

//add_action('init', 'automatic_posts');


function edit_posts() {
    $existingPosts = get_posts(['numberposts' => -1]);
    $datas = get_json_data();

    if(!empty($existingPosts)) {
        foreach($existingPosts as $existingPost) {
            $post = (array) $existingPost;
            foreach($datas as $data) {
                if(array_search($data->HelloAsso, $post)) {
                    $values = array(
                        'post_content'  => $data->detail,
                        // 'post_category'=> [$data->typeEvent, $data->Public]
                    );
                    array_push($post, $values);
                    wp_insert_post( $post );
                };
            }
        }
    }
}

// add_action('init', 'edit_posts');



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
	$articles = get_articles();
    $posts = get_posts(['numberposts' => -1]);
    
    $events = array();

	foreach($articles as $article) {
		foreach($posts as $post) {
            // Récupère les champs ACF
            //$add_fields = get_fields($post->ID);

            // pour récupérer la catégorie du post
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

			if($add_fields) {
                $post = array_merge($post, $add_fields );
            }

			if(array_search($post['post_title'], $article)) {
				$event = array_merge($post, $article);
            }
        }

        array_push($events, $event);
    }
    
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