<?php

namespace App\View\Components;

use Illuminate\View\Component;

class flashMessage extends Component
{
    public $msg;

    /**
     * Create a new component instance.
     *
     * @param $msg
     */
    public function __construct($msg = '')
    {
        $this->msg = $msg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.flash-message');
    }
}
