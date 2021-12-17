<?php

/*
|--------------------------------------------------------------------------
| Messages Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used for various texts that we need to
| display to the user.
|
*/

return [

    // Navigation
    'menu_link_login' => 'Connection',
    'menu_link_register' => 'Registration',
    'menu_link_my_cellars' => 'My cellars',
    'menu_link_bottles' => 'Bottles of wine',
    'menu_link_my_account' => 'My account',
    'menu_link_logout' => 'Log out',
    'menu_link_french' => 'Français',
    'menu_link_english' => 'English',

    // Auth -----------------------------------------------------------------------------------

    // Login page
    'login_title_page'   => 'My account',
    'login_label_for_email'   => 'Email',
    'login_label_for_password'   => 'Password',
    'login_button_login'   => 'Login',
    'login_button_register'   => 'Register',
    'login_remember_me_text'   => 'Remember me',
    'login_link_forgot_password'   => 'Forgot your password ?',
    'login_span_or_register_text'   => 'or register :',

    // Forgot password page
    'forgot_passport_text'   => 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
    'forgot_passport_button'   => 'Email password reset link',

    // Register page
    'register_title_page' => 'Register',
    'register_label_for_name'   => 'Full name *',
    'register_label_for_email'   => 'Email *',
    'register_label_for_password'   => 'Password *',
    'register_label_for_password_repeat'   => 'Confirm password *',
    'register_link_already_registered'   => 'Already registred ?',
    'register_button_register'   => 'Register',

    // Cellar -----------------------------------------------------------------------------------

    // Page index.blade.php de Cellar
    'cellar_index_title'   => 'Cellar',
    'cellar_index_link_create'   => 'Create a cellar',
    'cellar_index_link_see'   => 'See',
    'cellar_index_link_update'   => 'Update',
    'cellar_index_message_empty'   => 'You have no storeroom at the moment.',

    // Page create.blade.php de Cellar
    'cellar_create_title' => 'Creation of a cellar',
    'cellar_create_label_for_name' => 'Cellar name',
    'cellar_create_button_create' => 'Create',

    // Page edit.blade.php de Cellar
    'cellar_edit_title' => 'Update the cellar',
    'cellar_edit_label_for_name' => 'Cellar name',
    'cellar_edit_button_update' => 'Update',
	'cellar_edit_button_delete' => 'Delete',

    // Page show.blade.php de Cellar
    'cellar_show_search_bar_placeholder' => 'Search by name',
    'cellar_show_quantity_text' => 'Quantity :',
    'cellar_show_cellar_empty' => 'There are no bottles in the cellar.',
    'cellar_show_search_result_empty' => 'There is no bottle of his name in the cellar.',

    // Profile -----------------------------------------------------------------------------------

    'profil_show_title' => 'My account',
    'profil_show_profile_information_title' => 'Profile Information',
    'profil_show_profile_information_description' => 'Update your account\'s profile information and email address.',
    'profil_show_profile_information_label_name' => 'Name',
    'profil_show_profile_information_label_email' => 'Email',

    'profil_show_update_password_title' => 'Update Password',
    'profil_show_update_password_description' => 'Ensure your account is using a long, random password to stay secure.',
    'profil_show_update_password_label_current_password' => 'Current Password',
    'profil_show_update_password_label_new_password' => 'New Password',
    'profil_show_update_password_label_confirm_password' => 'Confirm Password',

    'profil_show_browser_sessions_title' => 'Browser Sessions',
    'profil_show_browser_sessions_description' => 'Manage and log out your active sessions on other browsers and devices.',
    'profil_show_browser_sessions_content' => 'If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.',
    'profil_show_browser_sessions_this_device_text' => 'This device',
    'profil_show_browser_sessions_last_active_text' => 'Last active',
    'profil_show_browser_sessions_logout_button' => 'Log Out Other Browser Sessions',
    'profil_show_browser_sessions_message_done' => 'Done.',
    'profil_show_browser_sessions_modal_title' => 'Log Out Other Browser Sessions',
    'profil_show_browser_sessions_modal_content' => 'Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.',
    'profil_show_browser_sessions_modal_label_password' => 'Password',

    'profil_show_delete_account_title' => 'Delete Account',
    'profil_show_delete_account_description' => 'Permanently delete your account.',
    'profil_show_delete_account_content' => 'Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.',
    'profil_show_delete_account_modal_title' => 'Delete Account',
    'profil_show_delete_account_modal_content' => 'Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',
    'profil_show_delete_account_modal_label_password' => 'Password',

    'profil_show_profile_message_success' => 'Saved.',
    'profil_show_profile_save_button' => 'Save',
    'profil_show_cancel_button' => 'Cancel',
    'profil_show_browser_sessions_modal_logout_button' => 'Log Out Other Browser Sessions',
    'profil_show_delete_account_delete_button' => 'Delete Account',

	// Bottle -----------------------------------------------------------------------------------

	//Page index.blade.php de Bottle
	'bottle_index_title'   => 'List from the SAQ',
    'bottle_index_search_bar_placeholder'   => 'Name, Country, Color, Price...',
    'bottle_index_database_empty'   => 'There are no bottles in the database.',
    'bottle_index_empty'   => 'Search for a bottle by name.',
    'bottle_index_search_result_empty'   => 'There is no bottle by this name on the list.',

    //Page show.blade.php de Bottle
	'bottle_show_title'   => 'Bottle details',
    'bottle_show_code_saq_text'   => 'SAQ code:',
	'bottle_show_return_button'   => 'Return',
    'bottle_show_bottle_quantity_text'   => 'Nb in total:',
    'bottle_show_no_cellar_text'   => 'You have no cellar',
];
