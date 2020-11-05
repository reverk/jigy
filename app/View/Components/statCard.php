<?php

namespace App\View\Components;

use Illuminate\View\Component;

class statCard extends Component
{
    public $name;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $value
     */
    public function __construct($name, $value)
    {
        //
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.stat-card');
    }
}
