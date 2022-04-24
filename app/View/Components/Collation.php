<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Collation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $selected; // new property

    public function __construct($collation)
    {
        $this->collation = $collation;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.collation');
    }
}
