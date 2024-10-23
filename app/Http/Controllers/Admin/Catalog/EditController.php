<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;

class EditController extends Controller
{
    public function __invoke($type, $id)
    {
        $model = $this->getModel($type);
        $item = $model::findOrFail($id);
        return view('admin.catalog.form', compact('item', 'type'));
    }

    private function getModel($type)
    {
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

