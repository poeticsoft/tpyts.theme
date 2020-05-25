<?php

function tpyts_block_app_register() {

  wp_register_style(
    'tpyts_block_app_edit_style',
    get_template_directory_uri() . '/apps/blocks/app.css',
    array(),
    filemtime(get_template_directory() . '/apps/blocks/app.css')
  );

  wp_register_script(
    'tpyts_block_app_edit_script',
    get_template_directory_uri() . '/apps/blocks/app.js',
    array(
      'wp-blocks',
      'wp-element',
      'wp-editor',
      'wp-i18n',
      'wp-data'
    ),
    filemtime(get_template_directory() . '/apps/blocks/app.js')
  );

  require get_template_directory() . '/plugin/blocks/app/callback.php';

  register_block_type(
    'tpyts/app',
    array(
      'editor_style' => 'tpyts_block_app_edit_style',
      'editor_script' => 'tpyts_block_app_edit_script',
      'render_callback' => 'tpyts_block_app_callback'
    )
  );
}

add_action(
  'init',
  'tpyts_block_app_register'
);