<?php

 function quickshop_files() {
    wp_enqueue_script('jquery-1-11-0-js', get_theme_file_uri('/js/jquery-1.11.0.js'), NULL, '1.0', true);
     wp_enqueue_script('jquery-easing-min-js', get_theme_file_uri('/js/jquery.easing.min.js'), NULL, '1.0', true);
     wp_enqueue_script('bootstrap-min-js', get_theme_file_uri('/js/bootstrap.min.js'), NULL, '1.0', true);
     wp_enqueue_script('landing-page-js', get_theme_file_uri('/js/landing-page.js'), NULL, '1.0', true);

    wp_enqueue_style('bootstrap-min-css', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('landing-page-css', get_template_directory_uri().'/css/landing-page.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/font-awesome-4.1.0/css/font-awesome.min.css');
    wp_enqueue_style('font-google', '//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic');
    wp_enqueue_style('quickshop_main_styles', get_stylesheet_uri());
 }

 add_action('wp_enqueue_scripts', 'quickshop_files');

 function quickshop_features() {
     add_theme_support('title-tag');
 }

 add_action('after_setup_theme', 'quickshop_features');

?>