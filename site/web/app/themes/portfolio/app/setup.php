<?php

/**
 * Theme setup.
 */

namespace App;

use WP_Query;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'disable-trackbacks',
        'google-analytics' => env('GOOGLE_ANALYTICS'),
        'js-to-footer',
        'nav-walker',
        'nice-search',
        'relative-urls'
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary' => __('Primary Menu', 'sage'),
        'homepage' => __('Homepage Menu', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style'
    ]);

    // Add Image Size
    add_image_size('project_thumbnail', 600, 300);
    add_image_size('bio_thumbnail', 600, 400);

    /**
     * Enable selective refresh for widgets in customizer.
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});

add_action('acf/init', function() {
    if( !function_exists('acf_add_options_page') )
        return false;


    /* acf_add_options_page(array(
        'position'      => 2.3, 
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
    )); */

     // Add parent.
     $parent = acf_add_options_page(array(
        'position'    => 2.3,
        'menu_title'  => __('Theme Settings'),
        'capability'  => 'edit_posts',
        'redirect'    => true,
    ));

    // Add sub page.
    acf_add_options_page(array(
        'page_title'  => __('General Settings'),
        'menu_title'  => __('General'),
        'capability'  => 'edit_posts',
        'parent_slug' => $parent['menu_slug'],
    ));

    // Add sub page.
    acf_add_options_page(array(
        'page_title'  => __('404 Settings'),
        'menu_title'  => __('404'),
        'capability'  => 'edit_posts',
        'parent_slug' => $parent['menu_slug'],
        'post_id' => '404_options',
    ));

});

// WP Forms
add_filter( 'wpforms_frontend_recaptcha', function ( $data, $form_data ) {
     
    $type = wpforms_setting( 'recaptcha_type', 'v3' );

    print_r($type); exit;
    if ( $captcha_settings['recaptcha_type'] === 'v3' ) {
        $data[ 'badge' ] = 'inline';
    }
 
    return $data;
 
}, 15, 2 );


add_filter( 'wpforms_display_submit_spinner_src', function ( $src, $form_data ) {
    return \Roots\asset('svg/light/spinner-third.svg')->uri();
}, 10, 2 );

// Disable Wordpress Search
add_action( 'parse_query', function ( $query, $error = true ) {
    if ( is_search() ) {
		$query->is_search = false;
		$query->query_vars['s'] = false;
		$query->query['s'] = false;
		
		// to error
		if ( $error == true )
			$query->is_404 = true;
	}
});
