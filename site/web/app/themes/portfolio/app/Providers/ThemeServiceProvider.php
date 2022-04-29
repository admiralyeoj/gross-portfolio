<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->register_post_types();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function register_post_types() {

        $labels = array(
            'name'                  => _x( 'Skills', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Skill', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Skills', 'sage' ),
            'name_admin_bar'        => __( 'Skill', 'sage' ),
            'archives'              => __( 'Skill Archives', 'sage' ),
            'attributes'            => __( 'Skill Attributes', 'sage' ),
            'parent_item_colon'     => __( 'Parent Skill:', 'sage' ),
            'all_items'             => __( 'All Skills', 'sage' ),
            'add_new_item'          => __( 'Add New Skill', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Skill', 'sage' ),
            'edit_item'             => __( 'Edit Skill', 'sage' ),
            'update_item'           => __( 'Update Skill', 'sage' ),
            'view_item'             => __( 'View Skill', 'sage' ),
            'view_items'            => __( 'View Skills', 'sage' ),
            'search_items'          => __( 'Search Skill', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'featured_image'        => __( 'Featured Image', 'sage' ),
            'set_featured_image'    => __( 'Set featured image', 'sage' ),
            'remove_featured_image' => __( 'Remove featured image', 'sage' ),
            'use_featured_image'    => __( 'Use as featured image', 'sage' ),
            'insert_into_item'      => __( 'Insert into Skill', 'sage' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Skill', 'sage' ),
            'items_list'            => __( 'Skills list', 'sage' ),
            'items_list_navigation' => __( 'Skills list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Skills list', 'sage' ),
        );
        $args = array(
          'label'                 => __( 'Skill', 'sage' ),
          'labels'                => $labels,
          'supports'              => array( 'title', 'thumbnail' ),
          // 'taxonomies'            => array( 'test' ),
          'hierarchical'          => false,
          'public'                => false,
          'show_ui'               => true,
          'show_in_menu'          => true,
          'menu_position'         => 5,
          'menu_icon'             => 'dashicons-edit',
          'show_in_admin_bar'     => true,
          'show_in_nav_menus'     => false,
          'can_export'            => true,
          'has_archive'           => false,
          'exclude_from_search'   => true,
          'publicly_queryable'    => true,
          'rewrite'               => false,
          'capability_type'       => 'page',
        );
        register_post_type( 'skills', $args );

    }
}
