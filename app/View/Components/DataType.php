<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $selected; // new property
    public $colnum; // new property

    public function __construct($selected, $colnum)
    {
        $this->selected = $selected;
        $this->colnum = $colnum;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-type');
    }
}
