<?php

namespace App\View\Components;

use Illuminate\View\Component;

class app extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $userIp;

    public function __construct($userIp)
    {
        //
        $this->userIp = $userIp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app');
    }
}
