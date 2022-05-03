<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageNotFound extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '404'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'page_title' => get_field('page_title', '404_options'),
            'behind_title' => get_field('behind_title', '404_options'),
            'description' => get_field('content', '404_options'),
        ];
    }
}
