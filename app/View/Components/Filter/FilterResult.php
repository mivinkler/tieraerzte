<?php

namespace App\View\Components\Filter;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterResult extends Component
{
    public $praxen;
    public $selectedTherapies;

    public function __construct(LengthAwarePaginator $praxen, array $selectedTherapies)
    {
        $this->praxen = $praxen;
        $this->selectedTherapies = $selectedTherapies;
    }

    public function render()
    {
        return view('components.filter.filter-result');
    }
}
