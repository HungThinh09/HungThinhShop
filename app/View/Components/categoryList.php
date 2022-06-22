<?php

namespace App\View\Components;

use Illuminate\View\Component;

class categoryList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $parentId;
    public $id=0;
    public $text;

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-list');
    }
}
