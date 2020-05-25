<?php

/* GET GAMES */

function tpyts_data() {

  $res = new WP_REST_Response();

  $wpfields = array(
    'ID',
    'post_title',
    'post_excerpt'
  );

  $wptypes = array(
    'provider',
    'shop',
    'service',
    'dealer'
  );

  $data = new stdClass();

  try {

    foreach($wptypes as $wptype) {      

      $args = array(
        'numberposts' => -1,
        'post_type' => $wptype
      );
    
      $typesname = $wptype . 's';
      $typesdata = [];
      $types = get_posts($args);

      foreach($types as $type) {

        $typedata = array_filter(
          (array) $type,
          function ($key) use ($wpfields){
  
            return in_array($key, $wpfields);
          },
          ARRAY_FILTER_USE_KEY
        );

        $typesdata[] = $typedata;
      }

      $data->$typesname = $typesdata;
    }

    $res->set_data($data);
    
  } catch (Exception $e) {
    
    $res->set_status($e->getCode());
    $res->set_data($e->getMessage());
  }

  return $res;
}

add_action(
  'rest_api_init',
  function () {

    register_rest_route(
      'tpyts',
      'data',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_data'
        )
      )
    );
  }
);