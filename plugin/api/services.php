<?php

/* GET SERVICES */

function tpyts_get_services() {

  $res = new WP_REST_Response();

  $siteurl = get_site_url();

  $wpfields = array(
    'ID',
    'post_title',
    'post_excerpt'
  );

  $blocknames = array(
    "tpyts/servicebasic" => "servicebasic",
    "core/gallery" => "gallery"
  );

  try {    

    $data = [];

    $args = array(
      'numberposts' => -1,
      'post_type' => 'service'
    );
  
    $services = get_posts($args);

    foreach($services as $service) {

      /* Basic fields */

      $servicedata = array_filter(
        (array) $service,
        function ($key) use ($wpfields){

          return in_array($key, $wpfields);
        },
        ARRAY_FILTER_USE_KEY
      );

      /* Blocks content */

      $serviceblocks = parse_blocks($service->post_content);
      $serviceblocksdata = new stdClass();

      foreach ($serviceblocks as $block) {

        if(isset($block['blockName']) && '' != $block['blockName']) {
          
          $blockname = $block['blockName']; 
          $dataname = $blocknames[$blockname];
          $servicedata[$dataname] = $block['attrs'];

          if(
            $block['innerBlocks']
            && 
            count($block['innerBlocks']) > 0
          ) {

            $servicedata[$dataname]['info'] = '';

            foreach($block['innerBlocks'] as $content) {

              $servicedata[$dataname]['info'] .= $content['innerHTML'];
            }
          }

          if($blockname == 'core/gallery') {

            $servicedata[$dataname] = [];
            $imageids = $block['attrs']['ids'];

            foreach($imageids as $index => $imageid) {

              $imagesiteurl = wp_get_attachment_url($imageid);
              $imageurl = str_replace($siteurl, '', $imagesiteurl);

              $servicedata[$dataname][] = $imageurl;
            }
          }
        }
      }

      /* Categories */
      
      $servicedata['categories'] = wp_get_post_categories(
        $service->ID,
        array(
          "fields" => "ids"
        )
      );

      /* Tags */

      $servicedata['tags'] = wp_get_post_tags(
        $service->ID,
        array(
          "fields" => "ids"
        )
      ); 
      
      /* Thumbnail */

      $thumbnailsiteurl = get_the_post_thumbnail_url( $service->ID, 'thumbnail' );
      $thumbnailurl = str_replace($siteurl, '', $thumbnailsiteurl);
      $servicedata['thumbnail'] = $thumbnailurl;

      $data[] = $servicedata;

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
      'services',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_get_services'
        )
      )
    );
  }
);