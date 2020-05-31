<?php

/* GET GAMES */

function tpyts_get_data() {

  $res = new WP_REST_Response();

  $siteurl = get_site_url();

  $data = new stdClass();

  try {

    $customlogoid = get_theme_mod('custom_logo');
    $logourl = wp_get_attachment_image_src($customlogoid , 'full')[0];
    $data->logo = str_replace($siteurl, '', $logourl);

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
          'callback' => 'tpyts_get_data'
        )
      )
    );
  }
);