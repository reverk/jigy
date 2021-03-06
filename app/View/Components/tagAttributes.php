<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tagAttributes extends Component
{
    public $article;
    public $paddings;

    /**
     * Create a new component instance.
     *
     * @param $article
     * @param $paddings
     */
    public function __construct($article, $paddings)
    {
        $this->paddings = $paddings;
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tag-attributes');
    }
}
