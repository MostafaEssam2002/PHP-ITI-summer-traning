<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public  $name;
    public  $class;
    public function __construct($name='Click',$class='primary')
    {
        //
        $this->name=$name;
        $this->class=$class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
