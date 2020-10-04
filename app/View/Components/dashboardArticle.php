<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dashboardArticle extends Component
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
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard-article');
    }
}
