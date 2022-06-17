<?php

namespace App\View\Components\web\blog\post;

use Illuminate\View\Component;

class Show extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    //  CREATING post THAT WILL CARRY A SPECIFIC POST
    public $post;
    // INITIALAZING post
    // SO THE VIEW WILL BE LOADED WITH THE SPECIFIC POST
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.blog.post.show');
    }
}
