<?php

/**
 * this function permits to add automatically posts
 * [TODO] Now implement with API values
 */
function automatic_posts() {

    // $post1 = [
    //     'post_title' => 'premier article automatique',
    //     'post_content' => 'ceci est un contenu',
    //     'post_status' => 'publish',
    // ];
    // $post2 = [
    //     'post_title' => 'deuxième article automatique',
    //     'post_content' => 'ceci est un contenu',
    //     'post_status' => 'publish',
    // ];

    // $posts = [$post1, $post2];
    $posts = get_articles();
    // d($posts);
    // d(get_posts(['numberposts' => -1]));
    $existingPosts = get_posts(['numberposts' => -1]);

    foreach($existingPosts as $existingPost) {
        $existingPostTitles[] =  $existingPost->post_title;
    };
    // d($existingPostTitles);
    if(!empty($posts)) {
        foreach($posts as $post) {
            d(in_array($post['post_title'], $existingPostTitles));

            if(!in_array($post['post_title'], $existingPostTitles)) {
                wp_insert_post( $post );
            }
        };
    }
}


add_action('init', 'automatic_posts');


// do_action( 'edit_post', 'automaticPosts' );


/*
( ! ) Warning: Invalid argument supplied for foreach() in C:\MAMP\htdocs\maison-de-l-apprendre\wp-content\themes\mda\inc\custom-functions.php on line 4
