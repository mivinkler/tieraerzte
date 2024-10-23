<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $type, $id)
    {
        $model = $this->getModel($type);
        $titleField = "{$type}_title";

        // Валидация данных запроса
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg|max:2048',
        ]);

        // Находим элемент, который нужно обновить
        $item = $model::findOrFail($id);

        // Массив данных для обновления
        $dataToUpdate = [
            $titleField => $request->input('title'),
        ];

        // Обработка иконки, если она загружена
        if ($request->hasFile('icon')) {
            // Получаем оригинальное имя файла без расширения
            $originalName = pathinfo($request->file('icon')->getClientOriginalName(), PATHINFO_FILENAME);

            // Генерация нового имени файла
            $filename = Str::slug($originalName) . '-' . time() . '.' . $request->file('icon')->getClientOriginalExtension();
            
            // Удаляем старую иконку, если она существует
            if ($item->icon_path) {
                Storage::delete("public/icons/{$item->icon_path}");
            }
            
            // Сохраняем новую иконку
            $path = $request->file('icon')->storeAs('public/icons', $filename);

            // Обновляем поле icon_path
            $dataToUpdate['icon_path'] = basename($path);
        }

        // Обновление записи в базе данных
        $item->update($dataToUpdate);

        return redirect()->route('admin.catalog.index', $type)->with('success', ucfirst($type) . ' updated successfully.');
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