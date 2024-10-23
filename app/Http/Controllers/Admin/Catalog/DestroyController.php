<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    public function __invoke($type, $id)
    {
        $model = $this->getModel($type);
        $item = $model::findOrFail($id);

        if ($item->icon_path) {
            Storage::delete("public/icons/{$item->icon_path}");
        }

        $item->delete();

        return redirect()->route('admin.catalog.index', $type)->with('success', ucfirst($type) . ' deleted successfully.');
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
