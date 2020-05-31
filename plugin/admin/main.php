<?php

function tpyts_admin_page () {

  ?>    
    <link 
      rel="stylesheet" 
      type="text/css"
      media="all"
      href="<?php echo get_template_directory_uri() ?>/apps/admin.css?<?php echo filemtime(get_template_directory() . '/apps/admin.css') ?>" 
    />
    <div id="TPYTSAdmin">ADMIN</div>
    <script
      type="text/javascript"
      src="<?php echo get_template_directory_uri() ?>/apps/admin.js?<?php echo filemtime(get_template_directory() . '/apps/admin.js') ?>"></script>
  <?php
}

function tpyts_add_admin_menu() {  

  add_menu_page(
    __('Admin', 'tpyts'),
    __('Admin', 'tpyts'),
    'manage_option',
    'admin', 
    'tpyts_admin_page',
    'dashicons-admin-generic', 
    2
  );
}

add_action(
  'admin_menu',
  'tpyts_add_admin_menu'
);

require_once(dirname(__FILE__) . '/metaboxes.php');


