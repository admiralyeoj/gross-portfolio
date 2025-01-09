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
            'image' => get_the_post_thumbnail(get_the_ID(), 'bio_thumbnail')
        ];
    }
}
