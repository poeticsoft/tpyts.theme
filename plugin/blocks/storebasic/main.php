<?php

function tpyts_block_storebasic_register() {

  /* PROD */

  wp_register_style(
    'tpyts_block_storebasic_edit_style',
    get_template_directory_uri() . '/plugin/blocks/storebasic/main.css',
    array(),
    filemtime(get_template_directory() . '/plugin/blocks/storebasic/main.css')
  );

  wp_register_script(
    'tpyts_block_storebasic_edit_script',
    get_template_directory_uri() . '/plugin/blocks/storebasic/main.js',
    array(
      'wp-blocks',
      'wp-element',
      'wp-editor',
      'wp-i18n',
      'wp-data'
    ),
    filemtime(get_template_directory() . '/plugin/blocks/storebasic/main.js')
  );

  /* DEV 

  wp_register_style(
    'tpyts_block_storebasic_edit_style',
    'http://localhost:8886/plugin/blocks/storebasic/main.css'
  );

  wp_register_script(
    'tpyts_block_storebasic_edit_script',
    'http://localhost:8886/plugin/blocks/storebasic/main.js'
  );

  */

  register_block_type(
    'tpyts/storebasic',
    array(
      'editor_style' => 'tpyts_block_storebasic_edit_style',
      'editor_script' => 'tpyts_block_storebasic_edit_script'
    )
  );
}

add_action(
  'init',
  'tpyts_block_storebasic_register'
);