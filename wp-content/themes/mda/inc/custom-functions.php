<?php

/**
 * this function permits to add automatically posts
 */
function automatic_posts() {
    $posts = [];

    $articles = get_articles();
    foreach($articles as $article) {
        $values = array(
            'post_content'          => $article['description'],
            'post_title'            => $article['title'],
            'post_date'             => $article['meta']->createdAt,
            'post_status'           => 'publish',
            'post_modified'         => $article['meta']->updatedAt,
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
