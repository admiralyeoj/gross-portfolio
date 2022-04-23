<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->site_name(),
            'title' => get_the_title(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function site_name()
    {
        return get_bloginfo('name', 'display');
    }
}
