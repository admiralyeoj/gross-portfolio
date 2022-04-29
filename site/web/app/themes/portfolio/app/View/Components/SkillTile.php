<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SkillTile extends Component
{

    public $title;

    public $postId;

    public $terms;

    public $image;

    public $image_alt;

    public $term_list = '';

    public $term_classes = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($postId, $title)
    {
        $this->title = $title;
        $this->postId = $postId;
        $this->terms = get_the_terms($this->postId, 'skill_type');
        $this->image = get_the_post_thumbnail($this->postId, 'medium');
        $this->image_alt = $this->get_featured_image_alt();

        $this->set_term_vars();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.skill-tile');
    }

    protected function get_featured_image_alt(  ) {
        $image_id = get_post_thumbnail_id( $this->postId );

        return get_post_meta($image_id , '_wp_attachment_image_alt', true);
    }

    protected function set_term_vars() {
        if(empty($this->terms))
            return false;

        $namesArray = $slugArray = [];
        foreach($this->terms as $key => $term) {
            $namesArray[] = $term->name;
            $slugArray[] = $term->slug;
        }

        $this->term_classes = implode(' ', $slugArray);
        $this->term_list = implode(', ', $namesArray);
    }
}
