<?php
/**
 * ***************
 * TEST AUTOMATIC CPT EVENTS
 * WITH ACF FIELDS AUTOMATICALLY POPULATED
 * ***************
 */

if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}


// Get JSON and Decode
// $json_request = wp_remote_get( 'http://wp-test/test/data.json');
$json_request = wp_remote_get(content_url().'/themes/mda/inc/doc/datasCopie.json');

if( is_wp_error( $json_request ) ) {
    return false;
}

$json_body = wp_remote_retrieve_body( $json_request );
$json_data = json_decode( $json_body );
// var_dump($json_data);

// Create new posts
foreach( $json_data as $item ) {
    $title = $item->nom;
    $desc = $item->detail;
    $guest_name = $item->structure;
    // update_field('guest_name', $item->structure);

    $new_post = array(
        'post_title' => $title,
        'post_content' => $desc,
        'post_status' => 'publish',
        'post_type' => 'events'
    );

    // create the post if not exist
    $post_id = post_exists( $title );
    if (!$post_id) {
        $post_id = wp_insert_post($new_post);
    }
}

// And populate the fields
add_filter('acf/load_value/name=guest_name', 'acf_guest_name_update_value', 10, 3);
// add_filter('acf/load_field/name=guest_name', 'load_acf_guest_name');
add_filter('acf/load_value/name=guest_web', 'acf_guest_web_update_value', 10, 3);
add_filter('acf/load_value/name=event_date', 'acf_event_date_update_value', 10, 3);
add_filter('acf/load_value/name=event_hour', 'acf_event_hour_update_value', 10, 3);


function acf_guest_name_update_value( $value, $post_id, $field ) {
    global $json_data;
    $actual_post_id = intval($_GET['post']);

    foreach( $json_data as $item ) {
        $title = $item->nom;
        $guest_name = $item->structure;

        // add value to guest_name field
        $post_id = post_exists( $title );
        if ($post_id === $actual_post_id) {
            if( is_string($value) ) {
                $value = $guest_name;
            }
            return $value;
        }
    }
}

// function load_acf_guest_name($field) {
//     global $json_data;
//     $actual_post_id = intval($_GET['post']);

//     foreach( $json_data as $item ) {
//         $title = $item->nom;
//         $guest_name = $item->structure;

//         // add value to guest_name field
//         $post_id = post_exists( $title );
//         if ($post_id === $actual_post_id) {
//             $field['default_value'] = __($guest_name, 'txtdomain');
//             return $field;
//         }
//     }
// }

function acf_guest_web_update_value( $value, $post_id, $field ) {
    global $json_data;
    $actual_post_id = intval($_GET['post']);

    foreach( $json_data as $item ) {
        $title = $item->nom;
        $guest_web = $item->site_web;

        // add value to guest_web field
        $post_id = post_exists( $title );
        if ($post_id === $actual_post_id) {
            if( is_string($value) ) {
                $value = $guest_web;
            }
            return $value;
        }
    }
}

function acf_event_date_update_value( $value, $post_id, $field ) {
    global $json_data;
    $actual_post_id = intval($_GET['post']);

    foreach( $json_data as $item ) {
        $title = $item->nom;
        $event_date = $item->date;

        // add value to event_date field
        $post_id = post_exists( $title );
        if ($post_id === $actual_post_id) {
            if( empty($value) ) {
                $value = $event_date;
            }
            return $value;
        }
    }
}

function acf_event_hour_update_value( $value, $post_id, $field ) {
    global $json_data;
    $actual_post_id = intval($_GET['post']);

    foreach( $json_data as $item ) {
        $title = $item->nom;
        $event_hour = $item->debut;

        // add value to event_hour field
        $post_id = post_exists( $title );
        if ($post_id === $actual_post_id) {
            if( empty($value) ) {
                $value = $event_hour;
            }
            return $value;
        }
    }
}
