<?php

function jerobern_enqueue_scripts() {
 
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3', 'all');

  wp_enqueue_style( 'style', get_stylesheet_uri() );

  wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array ( 'jquery' ), '4.1.3', true);
 
  wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array ( 'jquery', 'popper' ), '4.1.3', true);
 
}

add_action( 'wp_enqueue_scripts', 'jerobern_enqueue_scripts' );

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

/**
 * CPT RECIPES
 */
function jerobern_register_recipes() {
  $labels = array(
      'name' => __('Recipes', 'jerobern'),
      'singular_name' => __('Recipe', 'jerobern'),
      'add_new' => __('Add New Recipe', 'jerobern'),
      'all_items' => __('All Recipes', 'jerobern'),
      'add_new_items' => __('Add New Recipe', 'jerobern'),
      'edit_item' => __('Edit Recipe', 'jerobern'),
      'new_item' => __('New Recipe', 'jerobern'),
      'view_item' => __('View Recipe', 'jerobern'),
      'search_item' => __('Search Recipe', 'jerobern'),
      'not_found' => __('Recipe not found', 'jerobern'),
      'not_found_in_trash' => __('Recipe not found in the trash', 'jerobern'),
      'parent_item_colon' => __('Parent Recipe', 'jerobern'),
      
  );
  $args = array(  
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail'
      ),
      'taxonomies' => array(
          'allergies', 'difficulty', 'category'
      ),
      'menu_position' => 6,
      'exclude_from_search' => false,
      'menu_icon' => 'dashicons-carrot',
  );

  register_post_type('recipes', $args);
}

add_action('init', 'jerobern_register_recipes');

/**
 * CPT RECIPES TAXONOMIES
 */
function recipes_taxonomy() {  
  $difficultyLabels = array(
      'name' => __( 'Difficulties', 'taxonomy general name' ),
      'singular_name' => __( 'Difficulty', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Difficulties' ),
      'popular_items' => __( 'Popular Difficulties' ),
      'all_items' => __( 'All Difficulties' ),
      'parent_item' => null,
      'parent_item_colon' => null,
      'edit_item' => __( 'Edit Difficulty' ), 
      'update_item' => __( 'Update Difficulty' ),
      'add_new_item' => __( 'Add New Difficulty' ),
      'new_item_name' => __( 'New Difficulty Name' ),
      'add_or_remove_items' => __( 'Add or remove Difficulty' ),
      'choose_from_most_used' => __( 'Choose from the most used Difficulty' ),
      'menu_name' => __( 'Difficulty' ),
  );     
  register_taxonomy(  
      'difficulty',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
      'recipes',        //post type name
      array(  
          'hierarchical' => true,  
          'labels' => $difficultyLabels,  //Display name
          'query_var' => true,
          'rewrite' => array(
              'slug' => 'difficulty', // This controls the base slug that will display before each term
              'with_front' => false // Don't display the category base before 
          )
      )  
  );

  $allergyLabels = array(
      'name' => __( 'Allergies', 'taxonomy general name' ),
      'singular_name' => __( 'Allergy', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Allergies' ),
      'popular_items' => __( 'Popular Allergies' ),
      'all_items' => __( 'All Allergies' ),
      'parent_item' => null,
      'parent_item_colon' => null,
      'edit_item' => __( 'Edit Allergy' ), 
      'update_item' => __( 'Update Allergy' ),
      'add_new_item' => __( 'Add New Allergy' ),
      'new_item_name' => __( 'New Allergy Name' ),
      'add_or_remove_items' => __( 'Add or remove Allergy' ),
      'choose_from_most_used' => __( 'Choose from the most used Allergy' ),
      'menu_name' => __( 'Allergy' ),
  ); 
  register_taxonomy( 
      'allergies',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
      'recipes',        //post type name
      array(  
          'hierarchical' => true,  
          'labels' => $allergyLabels,  //Display name
          'query_var' => true,
          'rewrite' => array(
              'slug' => 'allergies', // This controls the base slug that will display before each term
              'with_front' => false // Don't display the category base before 
          )
      )  
  );  
}  

add_action( 'init', 'recipes_taxonomy');

/**
 * CPT EVENTS
 */
function jerobern_register_events() {
  $labels = array(
      'name' => __('Events', 'jerobern'),
      'singular_name' => __('Event', 'jerobern'),
      'add_new' => __('Add New Event', 'jerobern'),
      'all_items' => __('All Events', 'jerobern'),
      'add_new_items' => __('Add New Event', 'jerobern'),
      'edit_item' => __('Edit Event', 'jerobern'),
      'new_item' => __('New Event', 'jerobern'),
      'view_item' => __('View Event', 'jerobern'),
      'search_item' => __('Search Event', 'jerobern'),
      'not_found' => __('Event not found', 'jerobern'),
      'not_found_in_trash' => __('Event not found in the trash', 'jerobern'),
      'parent_item_colon' => __('Parent Event', 'jerobern'),
      
  );
  $args = array(  
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail',
          'revisions'
      ),
      'taxonomies' => array(
          'provincie', 'tags', 'setting'
      ),
      'menu_position' => 6,
      'exclude_from_search' => false,
      'menu_icon' => 'dashicons-universal-access',
  );

  register_post_type('events', $args);
}

add_action('init', 'jerobern_register_events');

/**
 * CPT EVENTS TAXONOMIES
 */
function events_taxonomy() {  
  $provincelabels = array(
      'name' => __( 'Provinces', 'taxonomy general name' ),
      'singular_name' => __( 'Province', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Provinces' ),
      'all_items' => __( 'All Provinces' ),
      'parent_item' => __( 'Parent Province' ),
      'parent_item_colon' => __( 'Parent Province:' ),
      'edit_item' => __( 'Edit Province' ), 
      'update_item' => __( 'Update Province' ),
      'add_new_item' => __( 'Add New Province' ),
      'new_item_name' => __( 'New Province Name' ),
      'menu_name' => __( 'Provinces' ),
    );    
  
  register_taxonomy(  
      'provincie', 
      'events',
      array(  
          'hierarchical' => true,  
          'labels' => $provincelabels,
          'query_var' => true,
          'rewrite' => array(
              'slug' => 'province',
              'with_front' => false
          )
      )  
  );  
  $settinglabels = array(
      'name' => __( 'Settings', 'taxonomy general name' ),
      'singular_name' => __( 'Setting', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Settings' ),
      'all_items' => __( 'All Settings' ),
      'parent_item' => __( 'Parent Setting' ),
      'parent_item_colon' => __( 'Parent Setting:' ),
      'edit_item' => __( 'Edit Setting' ), 
      'update_item' => __( 'Update Setting' ),
      'add_new_item' => __( 'Add New Setting' ),
      'new_item_name' => __( 'New Setting Name' ),
      'menu_name' => __( 'Settings' ),
    );    
  
  register_taxonomy(  
      'setting',
      'events',
      array(  
          'hierarchical' => true,  
          'labels' => $settinglabels,
          'query_var' => true,
          'rewrite' => array(
              'slug' => 'setting',
              'with_front' => false
          )
      )  
  );  
}

add_action( 'init', 'events_taxonomy');

function add_tags_to_events(){
    register_taxonomy_for_object_type('post_tag', 'events');
}

add_action('init','add_tags_to_events');

add_action('after_setup_theme', 'jerobern_setup');

if(! function_exists('jerobern_setup') ):
  function jerobern_setup() {
    register_nav_menu('top', __( 'Top menu', 'jerobern'));
  } 
endif;

require_once get_template_directory() . '/bs4navwalker.php';