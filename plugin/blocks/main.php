<?php

/* CATEGORY */

function tpyts_blocks_category($categories, $post) {

  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'tpyts',
        'title' => __(
          'Tu pide yo te sirvo',
          'tpyts' 
        ),
      ),
    )
  );
}

add_filter(
  'block_categories',
  'tpyts_blocks_category',
  10,
  2
);

/** -----------------------------------------------------------------------
 *  ALLOW
 */

 function tpyts_types_blocks_allowed($allowed_blocks, $post) {

  
  switch ($post->post_type) {

    case 'provider':
    case 'store':
    case 'service':

      // $allowed_blocks = array();
      // $allowed_blocks[] = 'tpyts/app';

      break;      
    
    default:
    
      break;
  }
 
	return $allowed_blocks;
}

add_filter(
  'allowed_block_types',
  'tpyts_types_blocks_allowed',
  10,
  2
);

/* BLOCKS */

// App

require_once(dirname(__FILE__) . '/providerbasic/main.php');
require_once(dirname(__FILE__) . '/storebasic/main.php');
require_once(dirname(__FILE__) . '/servicebasic/main.php');






