<?php

require_once(dirname(__FILE__) . '/data.php');
require_once(dirname(__FILE__) . '/terms.php');
require_once(dirname(__FILE__) . '/providers.php');
require_once(dirname(__FILE__) . '/stores.php');
require_once(dirname(__FILE__) . '/services.php');
require_once(dirname(__FILE__) . '/allergens.php');

function tpyts_api_bearer_auth_unauthenticated_urls_filter(
  $custom_urls, 
  $request_method
) {

  switch ($request_method) {

    case 'POST':

      break;

    case 'GET':

      $custom_urls[] = '/wp-json/tpyts/data';

      break;
  }

  return $custom_urls;
}

add_filter(
  'api_bearer_auth_unauthenticated_urls', 
  'tpyts_api_bearer_auth_unauthenticated_urls_filter', 
  10, 
  2
);
