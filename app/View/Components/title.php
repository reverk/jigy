<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class title extends Component
{
    public $name;

    /**
     * Create a new component instance.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.title');
    }
}
