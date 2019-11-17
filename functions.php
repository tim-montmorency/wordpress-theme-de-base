<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonction personnalisées au besoin
	/*-----------------------------------------------------------------------------------*/

/* --------------------------------
Ajoute les vignettes dans les posts de type Article */
add_theme_support( 'post-thumbnails' );


/* --------------------------------
Déclare le menu principal */
register_nav_menus( 
	array(
		/* Nom dans le code, Nom dans l'admin, Description dans l'admin */
		'main-menu' => __( 'Menu principal', 'Menu principal du site' ), 
		/* Dupliquer cette ligne si vous désirez déclarer d'autres menus */
	)
);


/* --------------------------------
Function déclarant la barre latérale principale */
function basic_sidebars() {
	register_sidebar(array(	
		'name' => __( 'Barre laterale principale', 'Barre latérale principale du site' ), 
	));
} 
/* Appel la fonction déclarant la barre latérale au moment de l'init des widgets */
add_action('widgets_init', 'basic_sidebars');


/* -------------------------------- 
Function ajoutant les styles et scripts */
function basic_style_and_js()  { 
	/* ajoute d'une feuille de style */
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	/* ajoute d'un fichier javascript */
	wp_enqueue_script('main.js', get_template_directory_uri() . '/main.js', array(), false, true);
}

/* Appel la fonction ajoutant les styles et scripts au moment où Wordpress gère les scripts */
add_action('wp_enqueue_scripts', 'basic_style_and_js'); 


/* --------------------------------
Ajout un type de post personnalisé
https://wpmarmite.com/snippet/creer-custom-post-type */
function create_post_type() {
	// Enregistrement de notre post type nommé "superheros" et de ses arguments
	register_post_type('superheros', 
		array(
			'labels' => array( /* Différents libellés de notre post */
				'name' => _x( 'Superheros', 'Nom générique'),
        'singular_name' => _x( 'Superhero', 'Au singulier'),
				'menu_name' => __( 'Superheros'),
				'all_items' => __( 'Tous les superheros'),
				'view_item' => __( 'Voir les superheros'),
				'add_new_item' => __( 'Ajouter un nouveau superhero'),
				'add_new' => __( 'Ajouter'),
				'edit_item' => __( 'Editer le superhero'),
				'update_item' => __( 'Modifier le superhero'),
				'search_items' => __( 'Rechercher un superhero'),
				'not_found' => __( 'Non trouvé'),
				'not_found_in_trash' => __( 'Non trouvé dans la corbeille'),
			),
			'supports' => array( /* Champs dans le tableau de bord */
				'title', 
				'editor', 
				'author', 
				'thumbnail', 
				'custom-fields',
			),
			'show_in_rest' => true, /* Disponible dans l'API */
			'public' => true, /* Est accessible au grand public */
			'has_archive' => true, /* Inclure une archive */
		)
	);
}

/* Appel la fonction ajoutant un post type personnalisé au moment où Wordpress s'instancie */
/* Commenté par défaut */
// add_action( 'init', 'create_post_type' );