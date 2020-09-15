<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class LatestArticle extends Component
{
    public $article;

    /**
     * Create a new component instance.
     *
     * @param $article
     */
    public function __construct($article)
    {
        //
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.latest-article');
    }
}
