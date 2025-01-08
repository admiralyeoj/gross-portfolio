<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProjectTile extends Component
{
    public $title;

    public $postId;

    public $imageSide;

    public $projectLink;

    public $content;

    public $image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($postId, $title, $imageSide='left')
    {
        $this->postId = $postId;
        $this->title = $title;
        $this->imageSide = $imageSide;
        $this->projectLink = get_field('project_link', $this->postId);

        $this->image = get_the_post_thumbnail($this->postId, 'project_thumbnail');
        $this->content = $this->get_content();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project-tile');
    }

  protected function get_content() {
    $content = get_the_content( '', '', $this->postId );
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );

    return $content;
  }
}
