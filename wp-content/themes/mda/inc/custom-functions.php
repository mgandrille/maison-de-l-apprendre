<?php

/**
 * this function permits to add automatically posts
 * [TODO] Now implement with API values
 */
function automatic_posts() {

    $post1 = [
        'post_title' => 'premier article automatique',
        'post_content' => 'ceci est un contenu',
        'post_status' => 'publish',
    ];
    $post2 = [
        'post_title' => 'deuxième article automatique',
        'post_content' => 'ceci est un contenu',
        'post_status' => 'publish',
    ];

    $posts = [$post1, $post2];
    $existingPosts = get_posts();

    foreach($existingPosts as $existingPost) {
        $existingPostTitles[] =  $existingPost->post_title;
    };
    foreach($posts as $post) {
        if(!in_array($post['post_title'], $existingPostTitles)) {
            wp_insert_post( $post );
        }
    };
}


add_action('init', 'automatic_posts');


// do_action( 'edit_post', 'automaticPosts' );


/*
( ! ) Warning: Invalid argument supplied for foreach() in C:\MAMP\htdocs\maison-de-l-apprendre\wp-content\themes\mda\inc\custom-functions.php on line 4
