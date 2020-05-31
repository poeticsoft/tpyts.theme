<?php
  
function tpyts_types_store_register() {

  $args = array(
    'public' => true,
    'show_ui' => true,  
    'show_in_menu' => true,
    'labels' => array(
      'name' => __('Stores', 'tpyts'),
      'singular_name' => __('Store', 'tpyts')
    ),
    'menu_icon' => 'dashicons-store',
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'excerpt',
      'revisions'
    ),
    'show_in_rest' => true,
    'taxonomies' => array(
      'category',
      'post_tag'
    ),
    'template' => array(
      array('tpyts/storebasic', array()),
      array('core/gallery', array()),
    ),
    'template_lock' => 'insert'
  );

  register_post_type(
    'store',
    $args
  );
}

add_action(
  'init',
  'tpyts_types_store_register'
);

?>