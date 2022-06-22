<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cartStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $style;
    public $status;
    public function __construct($status = 0, $style=0)
    {
        $this->status=$status;
        $this->style=$style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       $status=$this->status;
       $style= $this->style;
        return view('components.cart-status',[
            'status'  => $status,
            'style' => $style
        ]);
    }
}
