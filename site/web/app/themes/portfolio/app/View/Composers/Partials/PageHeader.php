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
        $content = get_the_content(  );
        $content = apply_filters( 'the_content', $content );
        $content = str_replace( ']]>', ']]&gt;', $content );

        return [
            'page_title' => get_field('title'),
            'behind_title' => get_field('behind_title'),
            'description' => $content,
        ];
    }
}
