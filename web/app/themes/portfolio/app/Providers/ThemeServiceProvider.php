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
        $this->register_taxonomy();

        add_action( 'admin_head', array( $this, 'fix_svg' ) );
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
          'taxonomies'            => array( 'skill_type' ),
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
        register_post_type( 'skill', $args );


        $labels = array(
            'name'                  => _x( 'Projects', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Projects', 'sage' ),
            'name_admin_bar'        => __( 'Project', 'sage' ),
            'archives'              => __( 'Project Archives', 'sage' ),
            'attributes'            => __( 'Project Attributes', 'sage' ),
            'parent_item_colon'     => __( 'Parent Project:', 'sage' ),
            'all_items'             => __( 'All Projects', 'sage' ),
            'add_new_item'          => __( 'Add New Project', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Project', 'sage' ),
            'edit_item'             => __( 'Edit Project', 'sage' ),
            'update_item'           => __( 'Update Project', 'sage' ),
            'view_item'             => __( 'View Project', 'sage' ),
            'view_items'            => __( 'View Projects', 'sage' ),
            'search_items'          => __( 'Search Project', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'featured_image'        => __( 'Featured Image', 'sage' ),
            'set_featured_image'    => __( 'Set featured image', 'sage' ),
            'remove_featured_image' => __( 'Remove featured image', 'sage' ),
            'use_featured_image'    => __( 'Use as featured image', 'sage' ),
            'insert_into_item'      => __( 'Insert into Project', 'sage' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Project', 'sage' ),
            'items_list'            => __( 'Projects list', 'sage' ),
            'items_list_navigation' => __( 'Projects list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Projects list', 'sage' ),
        );
        $args = array(
            'label'                 => __( 'Project', 'sage' ),
            'description'           => __( 'Post Type Description', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => false,
            'capability_type'       => 'page',
        );
        register_post_type( 'projects', $args );

    }

    protected function register_taxonomy() {
    
        $labels = array(
            'name'                       => _x( 'Types', 'Taxonomy General Name', 'sage' ),
            'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'sage' ),
            'menu_name'                  => __( 'Types', 'sage' ),
            'all_items'                  => __( 'All Types', 'sage' ),
            'parent_item'                => __( 'Parent Type', 'sage' ),
            'parent_item_colon'          => __( 'Parent Type:', 'sage' ),
            'new_item_name'              => __( 'New Type Name', 'sage' ),
            'add_new_item'               => __( 'Add New Type', 'sage' ),
            'edit_item'                  => __( 'Edit Type', 'sage' ),
            'update_item'                => __( 'Update Type', 'sage' ),
            'view_item'                  => __( 'View Type', 'sage' ),
            'separate_items_with_commas' => __( 'Separate Types with commas', 'sage' ),
            'add_or_remove_items'        => __( 'Add or remove Types', 'sage' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
            'popular_items'              => __( 'Popular Types', 'sage' ),
            'search_items'               => __( 'Search Types', 'sage' ),
            'not_found'                  => __( 'Not Found', 'sage' ),
            'no_terms'                   => __( 'No Types', 'sage' ),
            'items_list'                 => __( 'Types list', 'sage' ),
            'items_list_navigation'      => __( 'Types list navigation', 'sage' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => true,
            'rewrite'                    => false,
        );
        register_taxonomy( 'skill_type', array( 'skill' ), $args );
    
    }
    
    public function fix_svg() {
        echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
            </style>';
    }
}
