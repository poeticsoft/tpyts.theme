<?php

/* Admin Menus */

function tpyts_setup_remove_menus() {

  if(!current_user_can('manage_options')) {

    // remove_menu_page('edit.php'); 
    // remove_menu_page('themes.php');    
    remove_menu_page('edit-comments.php');  
    // remove_menu_page('plugins.php'); 
    // remove_menu_page('users.php');
    remove_menu_page('tools.php');
    // remove_menu_page('options-general.php');
    remove_menu_page('profile.php');
  }
}

add_action(
  'admin_menu',
  'tpyts_setup_remove_menus'
);

/* Admin styles */

function tpyts_admin_style() {

  /* PROD */
  
  wp_enqueue_style(
    'tpyts_admin_styles', 
    get_template_directory_uri() . '/plugin/setup/admin-styles.css',
    array(),
    filemtime(__DIR__ . '/admin-styles.css')
  );
  
  /* DEV
  wp_enqueue_style(
    'tpyts_admin_styles', 
    'http://localhost:8886/plugin/setup/admin-styles.css',
    array(),
    filemtime(__DIR__ . '/admin-styles.css')
  );
  */
}

add_action(
  'admin_enqueue_scripts',
  'tpyts_admin_style'
);