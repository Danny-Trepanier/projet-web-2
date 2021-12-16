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
    'login_label_for_email'   => 'Courriel',
    'login_label_for_password'   => 'Mot de passe',
    'login_button_login'   => 'Me connecter',
    'login_button_register'   => 'S\'enregistrer',
    'login_remember_me_text'   => 'Se souvenir de moi',
    'login_link_forgot_password'   => 'Mot de passe oublié ?',
    'login_span_or_register_text'   => 'ou inscrivez-vous :',

    // Forgot password page
    'forgot_passport_text'   => 'Mot de passe oublié? Aucun problème. Communiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d\'en choisir un nouveau.',
    'forgot_passport_button'   => 'Réinitialisation du mot de passe',

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
    'cellar_show_quantity_text' => 'Quantité :',
    'cellar_show_cellar_empty' => 'Il y a aucune bouteille dans le cellier.',
    'cellar_show_search_result_empty' => 'Il y a aucune bouteille de se nom dans le cellier.',

    // Profil -----------------------------------------------------------------------------------

    'profil_show_title' => 'Mon compte',
    'profil_show_profile_information_title' => 'Informations sur le profil',
    'profil_show_profile_information_description' => 'Mettez à jour les informations de profil et l\'adresse courriel de votre compte.',
    'profil_show_profile_information_label_name' => 'Nom',
    'profil_show_profile_information_label_email' => 'Courriel',

    'profil_show_update_password_title' => 'Mettre à jour le mot de passe',
    'profil_show_update_password_description' => 'Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.',
    'profil_show_update_password_label_current_password' => 'Mot de passe actuel',
    'profil_show_update_password_label_new_password' => 'Nouveau mot de passe',
    'profil_show_update_password_label_confirm_password' => 'Confirmez le mot de passe',

    'profil_show_browser_sessions_title' => 'Sessions de navigateur',
    'profil_show_browser_sessions_description' => 'Gérez et déconnectez-vous de vos sessions actives sur d\'autres navigateurs et appareils.',
    'profil_show_browser_sessions_content' => 'Si nécessaire, vous pouvez vous déconnecter de toutes vos autres sessions de navigateur sur tous vos appareils. Certaines de vos sessions récentes sont répertoriées ci-dessous; cependant, cette liste peut ne pas être exhaustive. Si vous pensez que votre compte a été compromis, vous devez également mettre à jour votre mot de passe.',
    'profil_show_browser_sessions_this_device_text' => 'Cet appareil',
    'profil_show_browser_sessions_last_active_text' => 'Dernière activité',
    'profil_show_browser_sessions_logout_button' => 'Déconnectez-vous des autres sessions de navigateur',
    'profil_show_browser_sessions_message_done' => 'Fait.',
    'profil_show_browser_sessions_modal_title' => 'Déconnectez-vous des autres sessions de navigateur',
    'profil_show_browser_sessions_modal_content' => 'Veuillez entrer votre mot de passe pour confirmer que vous souhaitez vous déconnecter de vos autres sessions de navigateur sur tous vos appareils.',
    'profil_show_browser_sessions_modal_label_password' => 'Mot de passe',

    'profil_show_delete_account_title' => 'Supprimer le compte',
    'profil_show_delete_account_description' => 'Supprimez définitivement votre compte.',
    'profil_show_delete_account_content' => 'Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger les données ou informations que vous souhaitez conserver.',
    'profil_show_delete_account_modal_title' => 'Supprimer le compte',
    'profil_show_delete_account_modal_content' => 'Êtes-vous sûr de vouloir supprimer votre compte ? Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.',
    'profil_show_delete_account_modal_label_password' => 'Mot de passe',

    'profil_show_profile_message_success' => 'Enregistrée.',
    'profil_show_profile_save_button' => 'Sauvegarder',
    'profil_show_cancel_button' => 'Annuler',
    'profil_show_browser_sessions_modal_logout_button' => 'Déconnectez-vous des autres sessions de navigateur',
    'profil_show_delete_account_delete_button' => 'Supprimer le compte',

    // Bottle -----------------------------------------------------------------------------------

	//Page index.blade.php de Bottle
	'bottle_index_title'   => 'Liste de la SAQ',
	'bottle_index_search_bar_placeholder'   => 'Nom, Pays, Couleur, Prix...',
	'bottle_index_database_empty'   => 'Il y a aucune bouteille dans la base de donnée.',
    'bottle_index_empty'   => 'Recherchez une bouteille par nom.',

    //Page show.blade.php de Bottle
	'bottle_show_title'   => 'Détails d\'une bouteille',
	'bottle_show_code_saq_text'   => 'Code SAQ:',
	'bottle_show_return_button'   => 'Retour',
	'bottle_show_bottle_quantity_text'   => 'Nb au cellier:',
    'bottle_show_no_cellar_text'   => 'Vous n\'avez aucun cellier',
];
