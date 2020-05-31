<?php

/* GET STORES */

function tpyts_get_providers() {

  $res = new WP_REST_Response();

  $siteurl = get_site_url();

  $wpfields = array(
    'ID',
    'post_title',
    'post_excerpt'
  );

  $blocknames = array(
    "tpyts/providerbasic" => "providerbasic",
    "core/gallery" => "gallery"
  );

  try {    

    $data = [];

    $args = array(
      'numberposts' => -1,
      'post_type' => 'provider'
    );
  
    $providers = get_posts($args);

    foreach($providers as $provider) {

      $providerdata = array_filter(
        (array) $provider,
        function ($key) use ($wpfields){

          return in_array($key, $wpfields);
        },
        ARRAY_FILTER_USE_KEY
      );

      /* Blocks content */

      $providerblocks = parse_blocks($provider->post_content);
      $providerblocksdata = new stdClass();

      foreach ($providerblocks as $block) {

        if(isset($block['blockName']) && '' != $block['blockName']) {
          
          $blockname = $block['blockName']; 
          $dataname = $blocknames[$blockname];
          $providerdata[$dataname] = $block['attrs'];

          if(
            $block['innerBlocks']
            && 
            count($block['innerBlocks']) > 0
          ) {

            $providerdata[$dataname]['info'] = '';

            foreach($block['innerBlocks'] as $content) {

              $providerdata[$dataname]['info'] .= $content['innerHTML'];
            }
          }

          if($blockname == 'core/gallery') {

            $providerdata[$dataname] = [];
            $imageids = $block['attrs']['ids'];

            foreach($imageids as $index => $imageid) {

              $imagesiteurl = wp_get_attachment_url($imageid);
              $imageurl = str_replace($siteurl, '', $imagesiteurl);

              $providerdata[$dataname][] = $imageurl;
            }
          }
        }
      }

      /* Categories */
      
      $providerdata['categories'] = wp_get_post_categories(
        $provider->ID,
        array(
          "fields" => "ids"
        )
      );

      /* Tags */

      $providerdata['tags'] = wp_get_post_tags(
        $provider->ID,
        array(
          "fields" => "ids"
        )
      ); 
      
      /* Thumbnail */

      $thumbnailsiteurl = get_the_post_thumbnail_url( $provider->ID, 'thumbnail' );
      $thumbnailurl = str_replace($siteurl, '', $thumbnailsiteurl);
      $providerdata['thumbnail'] = $thumbnailurl;

      $data[] = $providerdata;

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
      'providers',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_get_providers'
        )
      )
    );
  }
);