<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(Request $request, $type)
    {
        $model = $this->getModel($type);
        $titleField = "{$type}_title";

        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg|max:2048',
        ]);

        $item = new $model;
        $item->$titleField = $request->input('title');
        $item->save(); // Сохраняем элемент, чтобы получить его ID

        if ($request->hasFile('icon')) {
            $filename = Str::slug($request->input('title')) . '-' . $item->id . '.' . $request->file('icon')->getClientOriginalExtension();
            $path = $request->file('icon')->storeAs('public/icons', $filename);
            $item->icon_path = basename($path);
            $item->save();
        }

        return redirect()->route('admin.catalog.index', $type)->with('success', ucfirst($type) . ' created successfully.');
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

