<?php
  
function tpyts_types_dealer_register() {

  $args = array(
    'public' => true,
    'show_ui' => true, 
    'show_in_menu' => 'tpyts-types',
    'labels' => array(
      'name' => __('Dealers', 'tpyts'),
      'singular_name' => __('Dealer', 'tpyts')
    ),
    'menu_icon' => 'dashicons-admin-users',
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
    'dealer',
    $args
  );
}

add_action(
  'init',
  'tpyts_types_dealer_register'
);

?>