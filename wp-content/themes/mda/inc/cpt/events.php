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
            'menu_name'           => __( 'Ateliers'),
            // Les différents libellés de l'administration
            'all_items'           => __( 'Tous les ateliers', 'mda'),
            'view_item'           => __( 'Voir l\'atelier', 'mda'),
            'add_new_item'        => __( 'Ajouter un nouvel atelier', 'mda'),
            'add_new'             => __( 'Ajouter', 'mda'),
            'edit_item'           => __( 'Editer l\'atelier', 'mda'),
            'update_item'         => __( 'Modifier l\'atelier', 'mda'),
            'search_items'        => __( 'Rechercher un atelier', 'mda'),
            'not_found'           => __( 'Non trouvé', 'mda'),
            'not_found_in_trash'  => __( 'Non trouvé dans la corbeille', 'mda'),
        );

        // On peut définir ici d'autres options pour notre custom post type

        $args = array(
            'label'  => __( 'Atelier', 'mda'),
            'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => 5,
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


add_action( 'init', 'add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Type d'évènement, Public visé et Thème.
function add_taxonomies() {

	// Taxonomie Type d\'évènements

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_type = array(
		'name'              			=> _x( 'Types d\'évènements', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Type d\'évènements', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher un Type d\'évènements'),
		'all_items'        				=> __( 'Tous les Types d\'évènements'),
		'edit_item'         			=> __( 'Editer le Type d\'évènements'),
		'update_item'       			=> __( 'Mettre à jour le Type d\'évènements'),
		'add_new_item'     				=> __( 'Ajouter un nouveau Type d\'évènements'),
		'new_item_name'     			=> __( 'Valeur du nouveau Type d\'évènements'),
		'menu_name'                     => __( 'Type d\'évènements'),
	);

	$args_type = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_type,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'types' ),
	);

	register_taxonomy( 'types', 'events', $args_type );

	// Taxonomie Publics visés

	$labels_public = array(
		'name'                       => _x( 'Publics visés', 'taxonomy general name'),
		'singular_name'              => _x( 'Public visé', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher un Public visé'),
		// 'popular_items'              => __( 'Publics visés populaires'),
		'all_items'                  => __( 'Tous les Publics visés'),
		'edit_item'                  => __( 'Editer un Public visé'),
		'update_item'                => __( 'Mettre à jour un Public visé'),
		'add_new_item'               => __( 'Ajouter un nouveau Public visé'),
		'new_item_name'              => __( 'Nom du nouveau Public visé'),
		// 'separate_items_with_commas' => __( 'Séparer les Publics visés avec une virgule'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un Public visé'),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés'),
		'not_found'                  => __( 'Pas de Publics visés trouvés'),
		'menu_name'                  => __( 'Publics visés'),
	);

	$args_public = array(
		'hierarchical'          => false,
		'labels'                => $labels_public,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'public' ),
	);

	register_taxonomy( 'public', 'events', $args_public );


		// Taxonomie Thème

		$labels_theme = array(
			'name'                       => _x( 'Thèmes', 'taxonomy general name'),
			'singular_name'              => _x( 'Thème', 'taxonomy singular name'),
			'search_items'               => __( 'Rechercher un Thème'),
			// 'popular_items'              => __( 'Thèmes populaires'),
			'all_items'                  => __( 'Tous les Thèmes'),
			'edit_item'                  => __( 'Editer un Thème'),
			'update_item'                => __( 'Mettre à jour un Thème'),
			'add_new_item'               => __( 'Ajouter un nouveau Thème'),
			'new_item_name'              => __( 'Nom du nouveau Thème'),
			// 'separate_items_with_commas' => __( 'Séparer les Thèmes avec une virgule'),
			'add_or_remove_items'        => __( 'Ajouter ou supprimer un Thème'),
			'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés'),
			'not_found'                  => __( 'Pas de Thèmes trouvés'),
			'menu_name'                  => __( 'Thèmes'),
		);

		$args_theme = array(
			'hierarchical'          => false,
			'labels'                => $labels_theme,
			'show_ui'               => true,
			'show_in_rest'			=> true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'theme' ),
		);

		register_taxonomy( 'theme', 'events', $args_theme );



}