<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
          'title' => get_field('page_title'),
          'behind_title' => get_field('behind_title'),
          'content' => $this->get_content(),
        ];
    }

    protected function get_content() {
      $content = get_the_content(  );
      $content = apply_filters( 'the_content', $content );
      $content = str_replace( ']]>', ']]&gt;', $content );

      return $content;
    }

    
}
