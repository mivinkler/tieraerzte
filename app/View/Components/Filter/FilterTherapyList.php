<?php

namespace App\View\Components\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterTherapyList extends Component
{
    public $therapies;
    public $category;
    public $selectedTherapiesLookup;

    public function __construct($therapies, $category, $selectedTherapies)
    {
        $this->category = $category;
        $this->selectedTherapiesLookup = array_flip($selectedTherapies);

        $this->therapies = $therapies->filter(function ($therapy) {
            return $therapy->category == $this->category;
        });
    }
    

    public function isChecked($therapyId)
    {
        // Проверка существования ключа в массиве для улучшения производительности
        return isset($this->selectedTherapiesLookup[$therapyId]);
    }

    public function render(): View|Closure|string
    {
        return view('components.filter.filter-therapy-list', [
            'isChecked' => function ($id) { return $this->isChecked($id); },
        ]);
    }
}
