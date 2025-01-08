<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class TemplateContact extends Composer
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
        return [
            'email' => get_field('email', 'options'),
            'phone' => get_field('phone', 'options'),
            'location' => get_field('location', 'options'),
            'form_id' => get_field('form_id'),
        ];
    }
}
