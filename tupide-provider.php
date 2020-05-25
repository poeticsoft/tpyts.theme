<?php 

/*
 * Template Name: TPYTS Provider
 * Template Post Type: page
 */ 
 
?>
<html>
  <head>
    <title>TPYTS Provider</title>
    <meta name="viewport" 
          content="width=device-width, 
                   user-scalable=no, 
                   initial-scale=1, 
                   maximum-scale=5"
    >
    <script>
      tpyts = {
        app: 'tpyts'
      }
    </script>
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
    <link 
      rel="stylesheet" 
      type="text/css"
      media="all"
      href="<?php echo get_template_directory_uri() . 
                  '/apps/provider.css?' .                   
                  filemtime(get_template_directory() . 
                  '/apps/provider.css') 
      ?>" 
    />    
  </head>
  <body>    
    <?php
      include(__DIR__ . '/menu.php');
    ?>
    <div id="TPYTS"></div>      
    <script
      type="text/javascript"
      src="<?php echo get_template_directory_uri() . 
                      '/apps/provider.js?' . 
                      filemtime(get_template_directory() . 
                      '/apps/provider.js') 
      ?>" 
    ></script>
  </body>
</html>