<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormTherapyList extends Component
{
    public $praxis;
    public $category;
    public $therapies;
    public $startIndex;
    public $endIndex;

    public function __construct($category, $therapies, $praxis = null)
    {
        $this->praxis = $praxis;
        $this->category = $category;
        $this->therapies = $therapies;
        $this->initializeIndexes();
    }

    private function initializeIndexes()
    {
        if ($this->category == 2) {
            $this->startIndex = 3;
            $this->endIndex = 6;
        } else {
            $this->startIndex = 0;
            $this->endIndex = 3;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.form.form-therapy-list');
    }
}
