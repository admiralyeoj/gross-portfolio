<?php
/**
 * Theme functions
 *
 * @package BeerFrontier
 */

// insert a template part
function crd_import_part($part_name, $data = null, $class_name = null) {
    set_query_var('component_data', $data);
    set_query_var('component_class', $class_name);
    get_template_part('templates/' . $part_name);
    set_query_var('component_data', null);
    set_query_var('component_class', null);
}

// slugify string
function crd_slugify( $string, $remove_numbers = false ) {
    // replace non letter or digits by -
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
  
    // transliterate
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
  
    // remove unwanted characters
    $string = preg_replace('~[^-\w]+~', '', $string);
  
    // trim
    $string = trim($string, '-');
  
    // remove duplicated - symbols
    $string = preg_replace('~-+~', '-', $string);
  
    // lowercase
    $string = strtolower($string);
  
    // remove numbers
  
    if ($remove_numbers) {
      $string = preg_replace('/[0-9]+/', '', $string);
    }
  
    if (empty($string)) {
      return 'n-a';
    }
  
    return $string;
  }


    //register nav
    if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
   
      function mytheme_register_nav_menu(){
          register_nav_menus( array(
              'primary' => __( 'Primary Menu', 'text_domain' ),
              'secondary_menu' => __( 'Secondary Menu', 'text_domain' ),
              'footer'  => __( 'Footer Menu', 'text_domain' ),
          ) );
      }
      add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
  }
  

  add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);