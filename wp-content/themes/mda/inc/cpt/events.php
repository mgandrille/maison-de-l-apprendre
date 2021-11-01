<?php
if( !function_exists( 'create_events' ) ){

    function create_events() {

        // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
        $labels = array(
            // Le nom au pluriel
            'name'                => _x( 'Events', 'Post Type General Name'),
            // Le nom au singulier
            'singular_name'       => _x( 'Event', 'Post Type Singular Name'),
            // Le libellé affiché dans le menu
            'menu_name'           => __( 'Evènements'),
            // Les différents libellés de l'administration
            'all_items'           => __( 'Tous les évènements', 'mda'),
            'view_item'           => __( 'Voir l\'évènement', 'mda'),
            'add_new_item'        => __( 'Ajouter un nouvel évènement', 'mda'),
            'add_new'             => __( 'Ajouter', 'mda'),
            'edit_item'           => __( 'Editer l\'évènement', 'mda'),
            'update_item'         => __( 'Modifier l\'évènement', 'mda'),
            'search_items'        => __( 'Rechercher un évènement', 'mda'),
            'not_found'           => __( 'Non trouvé', 'mda'),
            'not_found_in_trash'  => __( 'Non trouvé dans la corbeille', 'mda'),
        );

        // On peut définir ici d'autres options pour notre custom post type

        $args = array(
            'label'  => __( 'Evènement', 'mda'),
            'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			// 'menu_position' => 5,
			// 'supports' => array('title','thumbnail','revisions'),

            'description'         => __( 'Tout sur Events'),
            // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
            'supports'            => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'comments',
                'revisions',
                'custom-fields',
            ),
            /*
            * Différentes options supplémentaires
            */
            'show_in_rest' => true,
            'rewrite'	=> array( 'slug' => 'event'),
			'menu_icon' => 'dashicons-tickets',
            'show_in_menu' => true,

        );

        // On enregistre notre custom post type qu'on nomme ici "events" et ses arguments
        register_post_type( 'events', $args );

    }
}

add_action( 'init', 'create_events', 10 );