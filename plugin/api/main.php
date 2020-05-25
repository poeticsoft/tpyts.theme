<?php

function tpyts_test() {

  $res = new WP_REST_Response();

  try { 

    $res->set_data('tpyts');
    
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
      'test',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_test'
        )
      )
    );
  }
);