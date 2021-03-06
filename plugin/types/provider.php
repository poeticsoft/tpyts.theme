<?php
  
function tpyts_types_provider_register() {

  $args = array(
    'public' => true,
    'show_ui' => true, 
    'show_in_menu' => true,
    'labels' => array(
      'name' => __('Providers', 'tpyts'),
      'singular_name' => __('Provider', 'tpyts')
    ),
    'menu_icon' => 'dashicons-admin-multisite',
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
      array('tpyts/providerbasic', array())
    ),
    'template_lock' => 'insert'
  );

  register_post_type(
    'provider',
    $args
  );
}

add_action(
  'init',
  'tpyts_types_provider_register'
);  

?>