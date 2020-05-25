
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" 
          content="width=device-width, 
                   user-scalable=no, 
                   initial-scale=1, 
                   maximum-scale=5"
    >
   
    <title>
      <?php
        wp_title( '|', true, 'right' );
        bloginfo( 'name' );
        $site_description = get_bloginfo( 'description', 'display' );
        if ($site_description) { echo " | $site_description"; }
      ?>
	  </title>
    <link 
      rel="stylesheet" 
      type="text/css"
      media="all"
      href="<?php echo get_template_directory_uri() . 
                  '/style.css?' .                   
                  filemtime(get_template_directory() . 
                  '/style.css') 
      ?>" 
    />    
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>