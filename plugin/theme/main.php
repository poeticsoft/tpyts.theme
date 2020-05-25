<?php

function tpyts_theme_setup() {

load_theme_textdomain('tpyts');
add_theme_support('custom-logo');
add_theme_support( 'post-thumbnails' );
}

add_action(
'after_setup_theme',
'tpyts_theme_setup'
);

register_nav_menus(array(
'primary' => __('Menú principal', 'tpyts')
));

/* Clean head */

function tpyts_remove_headlinks() {

  /*

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_resource_hints', 2 );
*/
}

add_action(
'init',
'tpyts_remove_headlinks'
);

function tpyts_remove_x_pingback($headers) {

  /*
  unset($headers['X-Pingback']); 
  return $headers; 
  */
} 

add_filter(
'wp_headers',
'tpyts_remove_x_pingback'
);  