<?php

namespace App\View\Composers\Partials;

use Roots\Acorn\View\Composer;

class PageHeader extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'page_title' => get_field('title'),
            'behind_title' => get_field('behind_title'),
            'intro' => get_field('intro'),
        ];
    }
}
