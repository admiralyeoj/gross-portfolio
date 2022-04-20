<?php
  add_filter('use_block_editor_for_post', '__return_false', 10);
  
  add_theme_support( 'align-wide' );
  add_theme_support( 'editor-styles' );
  
  // remove_theme_support( 'core-block-patterns' );
  function remove_default_stylesheets() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
  }
  add_action('wp_enqueue_scripts', 'remove_default_stylesheets', 100);
  add_action('admin_enqueue_scripts', 'remove_default_stylesheets');

  // Specify custom configuration values in this file; these will override values in `functions-config-defaults.php`
  // The general idea here is to allow for themes to be customized for specific installations
  defined( 'VOIDX_SCRIPTS_PAGELOAD' ) || define( 'VOIDX_SCRIPTS_PAGELOAD', false );

  // Only the bare minimum to get the theme up and running
  function voidx_setup() {
    add_theme_support( 'editor-styles' );

    // Language loading
    load_theme_textdomain( 'voidx', trailingslashit( get_template_directory() ) . 'languages' );

    // HTML5 support; mainly here to get rid of some nasty default styling that WordPress used to inject
    add_theme_support( 'html5', array( 'search-form', 'gallery' ) );

    // $content_width limits the size of the largest image size available via the media uploader
    // It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
    global $content_width;
    if ( !isset( $content_width ) || !is_int( $content_width ) )
      $content_width = (int) 960;

  }
  add_action( 'after_setup_theme', 'voidx_setup', 11 );

  // Sidebar declaration
  function voidx_widgets_init() {
    register_sidebar( array(
      'name'          => __( 'Main sidebar', 'voidx' ),
      'id'            => 'sidebar-main',
      'description'   => __( 'Appears to the right side of most posts and pages.', 'voidx' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ) );
  }
  add_action( 'widgets_init', 'voidx_widgets_init' );


  /**
   * Remove html margin when there's admin bar
   */
  function admin_head_margin() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }
  add_action('get_header', 'admin_head_margin');

  // allows for featured image.
  add_theme_support('post-thumbnails');

  // Use for includes.
  define('GET_DIR', get_template_directory());

  // Use for images.
  define('GET_URI', get_template_directory_uri());

  // allow svg upload to media library
  function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

?>