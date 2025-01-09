<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class TemplateSkills extends Composer
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
            'terms' => $this->get_skill_types(),
            'posts' => $this->get_skills(),
        ];
    }

    protected function get_skill_types() {

        $terms = get_terms(array(
            'taxonomy' => 'skill_type',
            'orderby' => 'name',
            'order' => 'ASC',
        ));

        return $terms;
    }

    protected function get_skills() {
        $args = array(
            'post_type' => 'skill',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        );

        $query = new WP_Query($args);
        return $query->posts;
    }
}
