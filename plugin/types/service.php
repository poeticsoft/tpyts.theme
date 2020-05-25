<?php
  
function tpyts_types_service_register() {

  $args = array(
    'public' => true,
    'show_ui' => true, 
    'show_in_menu' => 'tpyts-types',
    'labels' => array(
      'name' => __('Services', 'tpyts'),
      'singular_name' => __('Service', 'tpyts')
    ),
    'menu_icon' => 'dashicons-share-alt',
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
    )
  );

  register_post_type(
    'service',
    $args
  );
}

add_action(
  'init',
  'tpyts_types_service_register'
);

?>