<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TemplateAbout extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'partials.page-header',
        // 'partials.close-btn',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function override()
    {
        return [
            'attributes' => get_field('attributes'),
            'bio' => get_field('bio'),
        ];
    }
}
