<?php

/**
 * this function permits to add automatically posts
 */
function automatic_posts() {
    $posts = [];

    $articles = get_articles();
    foreach($articles as $article) {
        $values = array(
            'post_date'             => $article['meta']->createdAt,
            'post_content'          => $article['description'],
            'post_title'            => $article['title'],
            'post_excerpt' => '',
            'post_status'           => 'publish',
            'post_type' => 'post',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_modified'         => $article['meta']->updatedAt,
            'post_category'=> []
        );
        array_push($posts, $values);
    }

    $existingPosts = get_posts(['numberposts' => -1]);

    foreach($existingPosts as $existingPost) {
        $existingPostTitles[] =  $existingPost->post_title;
    };
    if(!empty($posts)) {
        foreach($posts as $post) {
            if(!in_array($post['post_title'], $existingPostTitles)) {
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
 * get_all_posts_infos
 *
 * @return array
 */
function get_all_posts_infos() {
	$articles = get_articles();
	$posts = get_posts();
	$events = array();
	foreach($articles as $article) {
		foreach($posts as $post) {
			$add_fields = get_fields();
			$post = (array) $post;
			if($add_fields) {
				$post = array_merge($post, $add_fields);
			}
			if(array_search($post['post_title'], $article)) {
				$event = array_merge($post, $article);
				// d($event);
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

    foreach($articles as $article) {
        $add_fields = get_fields();
        if($add_fields) {
            $event = array_merge($event, $add_fields);
        }
        if(array_search($event['post_title'], $article)) {
            $event = array_merge($event, $article);
        }
    }
    return $event;
}