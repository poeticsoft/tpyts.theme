<?php

/* CATEGORY */

function tpyts_category($categories, $post) {

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
  'tpyts_category',
  10,
  2
);

/** -----------------------------------------------------------------------
 *  ALLOW
 */

 function tpyts_types_blocks_allowed($allowed_blocks, $post) {

  
  switch ($post->post_type) {

    case 'provider':
    case 'shop':
    case 'service':
    case 'dealer':

      $allowed_blocks = array();
      $allowed_blocks[] = 'core/heading';
      $allowed_blocks[] = 'core/paragraph';
      $allowed_blocks[] = 'core/image';
      $allowed_blocks[] = 'core/gallery';

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

require_once(dirname(__FILE__) . '/app/main.php');





