<?php

function tpyts_get_allergens() {

  $res = new WP_REST_Response();

  try { 

    $allergens = array(
      array(
        "ID"=>"000",
        "title"=>"Gluten"
      ),
      array(
        "ID"=>"001",
      "title"=>"Crustáceos"
      ),
      array(
        "ID"=>"002",
      "title"=>"Huevos"
      ),
      array(
        "ID"=>"003",
        "title"=>"Pescado"
      ),
      array(
        "ID"=>"004",
        "title"=>"Cacahuetes"
      ),
      array(
        "ID"=>"005",
        "title"=>"Soja"
      ),
      array(
        "ID"=>"006",
        "title"=>"Leche"
      ),
      array(
        "ID"=>"007",
        "title"=>"Nueces"
      ),
      array(
        "ID"=>"008",
        "title"=>"Celery"
      ),
      array(
        "ID"=>"009",
        "title"=>"Mostaza"
      ),
      array(
        "ID"=>"010",
        "title"=>"Sésamo"
      ),
      array(
        "ID"=>"011",
        "title"=>"Sulfitos"
      ),
      array(
        "ID"=>"012",
        "title"=>"Lupin"
      ),
      array(
        "ID"=>"013",
        "title"=>"Moluscos"
      )   
    );

    $res->set_data($allergens);
    
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
      'allergens',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_get_allergens'
        )
      )
    );
  }
);