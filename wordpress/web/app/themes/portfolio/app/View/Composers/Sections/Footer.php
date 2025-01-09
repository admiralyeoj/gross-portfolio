<?php

namespace App\View\Composers\Sections;

use Roots\Acorn\View\Composer;

class Footer extends Composer
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
            'social_menu' => get_field('socials', 'options'),
        ];
    }
}
