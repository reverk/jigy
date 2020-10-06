<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCreateActions extends Component
{
    public $margins;

    /**
     * Create a new component instance.
     *
     * @param $margins
     */
    public function __construct($margins = "")
    {
        //
        $this->margins = $margins;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard-create-actions');
    }
}
