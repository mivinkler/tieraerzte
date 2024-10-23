<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($type)
    {
        $model = $this->getModel($type);
        $items = $model::all();
        return view('admin.catalog.index', compact('items', 'type'));
    }

    private function getModel($type)
    {
        // Приватный метод для получения модели по типу
        switch ($type) {
            case 'therapy':
                return \App\Models\TherapyList::class;
            case 'nursing':
                return \App\Models\NursingList::class;
            case 'service':
                return \App\Models\ServiceList::class;
            case 'device':
                return \App\Models\DeviceList::class;
            case 'animal':
                return \App\Models\AnimalList::class;
            case 'language':
                return \App\Models\LanguageList::class;
            default:
                abort(404);
        }
    }
}
