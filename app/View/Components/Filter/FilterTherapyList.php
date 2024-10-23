<?php
namespace App\View\Components\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterTherapyList extends Component
{
    public $therapyList;
    public $selectedItemsLookup;

    public function __construct($catalog, $selectedItems)
    {
        $this->selectedItemsLookup = array_flip($selectedItems);

        $this->therapyList = $catalog->filter(function ($item) {
            return $item;
        });
    }

    public function isChecked($itemId)
    {
        return isset($this->selectedItemsLookup[$itemId]);
    }

    public function render(): View|Closure|string
    {
        return view('components.filter.filter-therapy-list', [
            'isChecked' => function ($id) { return $this->isChecked($id); },
        ]);
    }
}
