<?php

/*
|--------------------------------------------------------------------------
| Lignes de langue pour les messages
|--------------------------------------------------------------------------
|
| Les lignes de langue suivantes sont utilisées pour divers
| textes que nous devons afficher à l'utilisateur.
|
*/

return [

    // Navigation
    'menu_link_login' => 'Connexion',
    'menu_link_register' => 'Inscription',
    'menu_link_my_cellars' => 'Mes celliers',
    'menu_link_bottles' => 'Bouteilles de vin',
    'menu_link_my_account' => 'Mon compte',
    'menu_link_logout' => 'Déconnexion',
    'menu_link_french' => 'Français',
    'menu_link_english' => 'English',

    // Authentification -----------------------------------------------------------------------------------

    // Page connexion
    'login_title_page'   => 'Mon compte',
    'login_label_for_email'   => 'Courriel *',
    'login_label_for_password'   => 'Mot de passe *',
    'login_button_login'   => 'Me connecter',
    'login_button_register'   => 'S\'enregistrer',
    'login_remember_me_text'   => 'Se souvenir de moi',
    'login_link_forgot_password'   => 'Mot de passe oublié ?',
    'login_span_or_register_text'   => 'ou inscrivez-vous :',

    // Page d'inscription
    'register_title_page' => 'M\'inscrire',
    'register_label_for_name'   => 'Nom complet *',
    'register_label_for_email'   => 'Courriel *',
    'register_label_for_password'   => 'Mot de passe *',
    'register_label_for_password_repeat'   => 'Confirmez le mot de passe *',
    'register_link_already_registered'   => 'Déjà inscrit ?',
    'register_button_register'   => 'S\'enregistrer',

    // Page index.blade.php de Cellar
    'cellar_index_title'   => 'Cellier',
    'cellar_index_link_create'   => 'Créer un cellier',
    'cellar_index_link_see'   => 'Voir',
    'cellar_index_link_update'   => 'Modifier',
    'cellar_index_message_empty'   => 'Vous n\'avez pas de cellier pour le moment.',

    // Page create.blade.php de Cellar
    'cellar_create_title' => 'Création d\'un cellier',
    'cellar_create_label_for_name' => 'Nom du cellier',
    'cellar_create_button_create' => 'Créer',

    // Page edit.blade.php de Cellar
    'cellar_edit_title' => 'Modifier le cellier',
    'cellar_edit_label_for_name' => 'Nom du cellier',
    'cellar_edit_button_update' => 'Modifier',
	'cellar_edit_button_delete' => 'Supprimer',

    // Page show.blade.php de Cellar
    'cellar_show_search_bar_placeholder' => 'Recherche par nom',
    'cellar_show_quantity_text' => 'Quantité :|Quantités :',
    'cellar_show_cellar_empty' => 'Il y a aucune bouteille dans le cellier.',
    'cellar_show_search_result_empty' => 'Il y a aucune bouteille de se nom dans le cellier.',

	//Page index.blade.php de Bottle
	'bottle_index_title'   => 'Liste de la SAQ',
	'bottle_index_search_bar_placeholder'   => 'Nom, Pays, Couleur, Prix...',
	'bottle_index_database_empty'   => 'Il y a aucune bouteille dans la base de donnée.',

    //Page show.blade.php de Bottle
	'bottle_show_title'   => 'Détails d\'une bouteille',
	'bottle_show_code_saq_text'   => 'Code SAQ:',
	'bottle_show_return_button'   => 'Retour',
	'bottle_show_bottle_quantity_text'   => 'Nb au cellier:',
    'bottle_show_no_cellar_text'   => 'Vous n\'avez aucun cellier',
];
