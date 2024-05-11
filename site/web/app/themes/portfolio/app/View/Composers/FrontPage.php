<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FrontPage extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        //
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $nav_items = $this->get_homepage_nav();

        if( !empty($nav_items) ) {
            foreach($nav_items as &$item) {
                $item->icon = get_field('icon', $item);
            }
        }

        return [
            'nav' => $nav_items,
        ];
    }

    /**
     * Returns the homepage nav items
     *
     * @return string
     */
    public function get_homepage_nav() {
        $menus = get_nav_menu_locations();

        if(!empty($menus['homepage']))
            return wp_get_nav_menu_items($menus['homepage']);
    }
}
