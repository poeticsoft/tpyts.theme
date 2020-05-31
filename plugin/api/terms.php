<?php

function tpyts_get_terms() {

  $res = new WP_REST_Response();

  try { 

    $terms = new stdClass();
    $terms->categories = new stdClass();
    $terms->tags = new stdClass();
    $categories = get_categories();
    $tags = get_tags();

    foreach($categories as $category) {

      $id = $category->term_id;
      $terms->categories->$id = array(
        "name" => $category->name,
        "slug" => $category->slug
      );
    }

    foreach($tags as $tag) {

      $id = $tag->term_id;
      $terms->tags->$id = array(
        "name" => $tag->name,
        "slug" => $tag->slug
      );
    }

    $res->set_data($terms);
    
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
      'terms',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_get_terms'
        )
      )
    );
  }
);