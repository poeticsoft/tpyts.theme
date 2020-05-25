<?php

/* Admin Menus */

function tpyts_setup_remove_menus() {

  if(!current_user_can('manage_options')) {

    remove_menu_page('edit.php'); 
    remove_menu_page('themes.php');    
    remove_menu_page('edit-comments.php');  
    remove_menu_page('plugins.php'); 
    remove_menu_page('users.php');
    remove_menu_page('tools.php');
    remove_menu_page('options-general.php');
    remove_menu_page('profile.php');
  }
}

add_action(
  'admin_menu',
  'tpyts_setup_remove_menus'
);

/* Admin styles */

function tpyts_admin_style() {

  wp_enqueue_style(
    'tpyts_admin_styles', 
    get_template_directory_uri() . '/plugin/setup/admin-styles.css',
    array(),
    filemtime(__DIR__ . '/admin-styles.css')
  );
}
add_action(
  'admin_enqueue_scripts',
  'tpyts_admin_style'
);

/* Categories for Reusable blocks */

function tpyts_add_taxonomies_to_types() {

  register_taxonomy_for_object_type( 'category', 'wp_block' );
  register_taxonomy_for_object_type( 'category', 'page' );
}

  add_action(
   'init',
   'tpyts_add_taxonomies_to_types'
);

function tpyts_wp_block_categories_column($columns) {

  $columns['categories'] = 'Category';
  return $columns;
}

add_filter(
  'manage_edit-wp_block_columns',
  'tpyts_wp_block_categories_column'
);