<?php

/* GET STORES */

function tpyts_get_stores() {

  $res = new WP_REST_Response();

  $siteurl = get_site_url();

  $wpfields = array(
    'ID',
    'post_title',
    'post_excerpt'
  );

  $blocknames = array(
    "tpyts/storebasic" => "storebasic",
    "core/gallery" => "gallery"
  );

  try {    

    $data = [];

    $args = array(
      'numberposts' => -1,
      'post_type' => 'store'
    );
  
    $stores = get_posts($args);

    foreach($stores as $store) {

      /* Basic fields */

      $storedata = array_filter(
        (array) $store,
        function ($key) use ($wpfields){

          return in_array($key, $wpfields);
        },
        ARRAY_FILTER_USE_KEY
      );

      /* Blocks content */

      $storeblocks = parse_blocks($store->post_content);
      $storeblocksdata = new stdClass();

      foreach ($storeblocks as $block) {

        if(isset($block['blockName']) && '' != $block['blockName']) {
          
          $blockname = $block['blockName']; 
          $dataname = $blocknames[$blockname];
          $storedata[$dataname] = $block['attrs'];

          if(
            $block['innerBlocks']
            && 
            count($block['innerBlocks']) > 0
          ) {

            $storedata[$dataname]['info'] = '';

            foreach($block['innerBlocks'] as $content) {

              $storedata[$dataname]['info'] .= $content['innerHTML'];
            }
          }

          if($blockname == 'core/gallery') {

            $storedata[$dataname] = [];
            $imageids = $block['attrs']['ids'];

            foreach($imageids as $index => $imageid) {

              $imagesiteurl = wp_get_attachment_url($imageid);
              $imageurl = str_replace($siteurl, '', $imagesiteurl);

              $storedata[$dataname][] = $imageurl;
            }
          }
        }
      }

      /* Categories */
      
      $storedata['categories'] = wp_get_post_categories(
        $store->ID,
        array(
          "fields" => "ids"
        )
      );

      /* Tags */

      $storedata['tags'] = wp_get_post_tags(
        $store->ID,
        array(
          "fields" => "ids"
        )
      ); 
      
      /* Thumbnail */

      $thumbnailsiteurl = get_the_post_thumbnail_url( $store->ID, 'thumbnail' );
      $thumbnailurl = str_replace($siteurl, '', $thumbnailsiteurl);
      $storedata['thumbnail'] = $thumbnailurl;

     $data[] = $storedata;
     
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
      'stores',
      array(
        array(
          'methods'  => 'GET',
          'callback' => 'tpyts_get_stores'
        )
      )
    );
  }
);