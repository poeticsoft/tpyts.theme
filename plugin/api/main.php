<?php

require_once(dirname(__FILE__) . '/test.php');
require_once(dirname(__FILE__) . '/data.php');

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
