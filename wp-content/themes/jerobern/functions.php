<?php

function jerobern_enqueue_scripts() {
 
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3', 'all');

  wp_enqueue_style( 'style', get_stylesheet_uri() );

  wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array ( 'jquery' ), '4.1.3', true);
 
  wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array ( 'jquery', 'popper' ), '4.1.3', true);
 
}

function jerobern_widgets_init() {
  register_sidebar( array(
    'name' => __('Primary Sidebar', 'jerobern'),
    'id' => 'sidebar_primary',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
  ));
}
add_action( 'widgets_init', 'jerobern_widgets_init');
add_action( 'wp_enqueue_scripts', 'jerobern_enqueue_scripts' );
add_action('after_setup_theme', 'jerobern_setup');
  if(! function_exists('jerobern_setup') ):
    function jerobern_setup() {
      register_nav_menu('top', __( 'Top menu', 'jerobern'));
    } endif;

require_once get_template_directory() . '/bs4navwalker.php';