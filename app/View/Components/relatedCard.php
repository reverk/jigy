<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class relatedCard extends Component
{
    public $article;

    /**
     * Create a new component instance.
     *
     * @return void
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
        return view('components.related-card');
    }
}
