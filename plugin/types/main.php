<?php

/* TYPES */  

$types = array(
  'provider',
  'shop',
  'service',
  'dealer'
);

foreach($types as $type) {  
  
  require_once(dirname(__FILE__) . '/' . $type .'.php'); 
   
  register_rest_field(
    $type,
    'tpyts_fields',
    array(
      'get_callback' => function ($data) {
        
        return get_post_meta($data['id']);
      }
    )
  );
}
 
// Types

function tpyts_types_menu() {

  add_menu_page(
    __('TPYTS', 'tpyts'), 
    __('TPYTS', 'tpyts'), 
    'manage_options', 
    'tpyts-types',
    '',
    'dashicons-products',
    3
  );
}

add_action(
  'admin_menu',
  'tpyts_types_menu'
);

?>