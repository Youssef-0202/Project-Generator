<?php

namespace App\View\Components\template1;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class portfolio extends Component
{
    /**
     * Create a new component instance.
     */
    public $content;

    public function __construct($content)
    {
        $this->content = $content; // Bind the content passed to this component
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.template1.portfolio');
    }
}
