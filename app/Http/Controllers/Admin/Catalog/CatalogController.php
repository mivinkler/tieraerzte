<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
// Отображение формы создания нового элемента
    public function create($type)
    {
        return view('admin.catalog.form', compact('type'));
    }

    // Отображение списка элементов
    public function index($type)
    {
        $model = $this->getModel($type);
        $items = $model::all();
        return view('admin.catalog.index', compact('items', 'type'));
    }

    // Сохранение нового элемента или обновление существующего
    public function storeOrUpdate(Request $request, $type, $id = null)
    {
        $model = $this->getModel($type);
        $titleField = "{$type}_title";

        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg|max:2048',
        ]);

        // Использование updateOrCreate для создания или обновления записи
        $item = $model::updateOrCreate(
            ['id' => $id],
            [$titleField => $request->input('title')]
        );

        if ($request->hasFile('icon')) {
            // Удаление старой иконки, если она существует
            if ($item->icon_path) {
                Storage::delete("public/icons/{$item->icon_path}");
            }

            // Генерация короткого имени файла
            $filename = Str::slug($request->input('title')) . '-' . $item->id . '.' . $request->file('icon')->getClientOriginalExtension();
            $path = $request->file('icon')->storeAs('public/icons', $filename);
            $item->icon_path = basename($path);
            $item->save();
        }

        return redirect()->route('admin.catalog.index', $type)
            ->with('success', ucfirst($type) . ($id ? ' updated' : ' created') . ' successfully.');
    }

    // Отображение формы редактирования элемента
    public function edit($type, $id)
    {
        $model = $this->getModel($type);
        $item = $model::findOrFail($id);
        return view('admin.catalog.form', compact('item', 'type'));
    }

    // Удаление элемента
    public function destroy($type, $id)
    {
        $model = $this->getModel($type);
        $item = $model::findOrFail($id);

        if ($item->icon_path) {
            Storage::delete("public/icons/{$item->icon_path}");
        }

        $item->delete();

        return redirect()->route('admin.catalog.index', $type)->with('success', ucfirst($type) . ' deleted successfully.');
    }

    // Приватный метод для получения модели по типу
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
