<?php
  
function tpyts_types_shop_register() {

  $args = array(
    'public' => true,
    'show_ui' => true, 
    'show_in_menu' => 'tpyts-types',
    'labels' => array(
      'name' => __('Shops', 'tpyts'),
      'singular_name' => __('Shop', 'tpyts')
    ),
    'menu_icon' => 'dashicons-cart',
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
    'shop',
    $args
  );
}

add_action(
  'init',
  'tpyts_types_shop_register'
);

?>