<?php
if( !function_exists( 'create_programmes' ) ){

    function create_options_page() {

        // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
        $labels = array(
            // Le nom au pluriel
            'name'                => _x( 'Options Page', 'Post Type General Name'),
            // Le nom au singulier
            'singular_name'       => _x( 'Option Page', 'Post Type Singular Name'),
            // Le libellé affiché dans le menu
            'menu_name'           => __( 'Page d\'options'),
            // Les différents libellés de l'administration
            'all_items'           => __( 'Toutes les options'),
            'view_item'           => __( 'Voir l\'options'),
            'add_new_item'        => __( 'Ajouter une nouvelle option'),
            'add_new'             => __( 'Ajouter'),
            'edit_item'           => __( 'Editer l\'option'),
            'update_item'         => __( 'Modifier l\'option'),
            'search_items'        => __( 'Rechercher une option'),
            'not_found'           => __( 'Non trouvée'),
            'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
        );

        // On peut définir ici d'autres options pour notre custom post type

        $args = array(
            'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			// 'menu_position' => 5,
			'supports' => array('title','thumbnail','revisions'),

            'label'               => __( 'Options Page'),
            'description'         => __( 'Tout sur Options Page'),
            // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            /*
            * Différentes options supplémentaires
            */
            'show_in_rest' => true,
            'rewrite'			  => array( 'slug' => 'option-page'),
			'menu_icon' => 'dashicons-paperclip',

        );

        // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
        register_post_type( 'options_page', $args );

    }
}

add_action( 'init', 'create_options_page', 0 );