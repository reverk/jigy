<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class navbarItemLink extends Component
{
    /**
     * The icon type.
     *
     * @var string
     */
    public $iconName;

    /**
     * The link name.
     *
     * @var string
     */
    public $name;

    /**
     * The redirect URL.
     *
     * @var string
     */
    public $routeTo;

    /**
     * Create a new component instance.
     *
     * @param $iconName
     * @param $name
     * @param $routeTo
     */
    public function __construct($iconName, $name, $routeTo)
    {
        $this->iconName = $iconName;
        $this->routeTo = $routeTo;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.layouts.navbar-item-link');
    }
}
