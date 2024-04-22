<?php

namespace App\View\Components\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterHeader extends Component
{
    public $title;
    public $postcode;
    public $radius;
    
    public function __construct($title, $postcode, $radius)
    {
        $this->title = $title;
        $this->postcode = $postcode;
        $this->radius = $radius;
    }

    public function render(): View|Closure|string
    {
        return view('components.filter.filter-header');
    }
}
