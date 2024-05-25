<?php

namespace App\Services\Praxis;

use App\Models\Clinic;
use App\Models\Therapy;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use App\Components\GeocodingClient;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Service {
    public function createClinic($data) {
        return $this->processPraxisData($data, new Clinic());
    }

    public function updateClinic($praxis, $data) {
        return $this->processPraxisData($data, $praxis);
    }

    protected function processPraxisData($data, Clinic $praxis) {
        try {
            DB::beginTransaction();

            $praxis->fill($this->prepareBasicData($data))->save();

            $this->handleDynamicData($praxis, $data);

            DB::commit();
            return $praxis;

        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
            throw new Exception('Failed to process Praxis data');
        }
    }

    protected function prepareBasicData($data) {
        $slug = Str::slug($data['title']);
        $basicData = Arr::except($data, [
            'text_aboutus', 'title_one', 'text_one', 'title_two', 'text_two', 'title_three', 'text_three', 'text_sitebar',
            'therapy', 'therapy_text', 'other_id', 'other_title', 'other_text', 
            'image'
        ]);
        $basicData['slug'] = $slug;
    
        return $basicData;
    }

    protected function handleDynamicData($praxis, $data) {
        $this->handleTexts($praxis, $data);
        $this->handleImage($praxis, $data);
        $this->handleTherapies($praxis, $data);
        $this->handleOtherTherapies($praxis, $data);
        $this->handleGeoCoordinates($praxis, $data);
    }

    protected function handleTexts($praxis, $data) {
        foreach (['text_aboutus', 'title_one', 'text_one', 'title_two', 'text_two', 'title_three', 'text_three', 'text_sitebar'] as $field) {
            if (isset($data[$field])) {
                $praxis->text()->updateOrCreate(['clinic_id' => $praxis->id], [$field => $data[$field]]);
            }
        }
    }
    
    // protected function handleImage($praxis, $data) {
    //     if (isset($data['image'])) {
    //         $image = $data['image'];
    //         $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            
    //         // Сохраняем файл в директорию 'images' на диске 'public' и задаем имя файла
    //         /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
    //         $disk = Storage::disk('public');
    //         $path = $disk->putFileAs('images', $image, $name);
    
    //         // Обновляем или создаем запись в базе данных с путем к файлу
    //         $praxis->images()->updateOrCreate(['clinic_id' => $praxis->id], ['path' => $path, 'url' => ('/storage/' . $path)]);
    //     }
    // }

    protected function handleImage($praxis, $data) {
        if (isset($data['image'])) {
            $img = $data['image'];
            $name = md5(Carbon::now() . '_' . $img->getClientOriginalName()) . '.' . $img->getClientOriginalExtension();
            
            // Сохраняем файл в директорию 'images' на диске 'public' и задаем имя файла
            $path = 'images/' . $name;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($img);
            $image
                ->resize(200, null)
                ->save(storage_path('app/public/images/' . $name));
            
            // Обновляем или создаем запись в базе данных с путем к файлу
            $praxis->images()->updateOrCreate(['clinic_id' => $praxis->id], ['foto_path' => $path, 'url' => ('/storage/' . $path)]);
        }
    }
    
    protected function handleGeoCoordinates($praxis, $data) {
        if (isset($data['street'], $data['house'], $data['locality'], $data['postcode'])) {
            $geocodingClient = new GeocodingClient();
            $coordinates = $geocodingClient->getCoordinatesByAddress("{$data['street']} {$data['house']}, {$data['locality']}, {$data['postcode']}, Germany");
    
            if ($coordinates) {
                $praxis->geoCoordinates()->updateOrCreate(
                    ['clinic_id' => $praxis->id],
                    [
                        'latitude' => $coordinates['latitude'], 
                        'longitude' => $coordinates['longitude']
                    ]
                );
            }
        }
    }

    protected function handleTherapies($praxis, $data) {
        if (empty($data['therapy'])) {
            return;
        }
        $therapiesData = $data['therapy'] ?? [];
        $existingTherapies = $praxis->therapyClinics()->get()->keyBy('therapy_id');

        foreach ($therapiesData as $therapyId) {
            $therapyText = $data['therapy_text'][$therapyId] ?? null;
            $therapy = Therapy::find($therapyId);
            
            $existingTherapy = $existingTherapies->pull($therapyId);

            if ($existingTherapy && $existingTherapy->therapy_text !== $therapyText) {
                $existingTherapy->update(['therapy_text' => $therapyText]);
            } elseif (!$existingTherapy) {
                $praxis->therapyClinics()->create([
                    'therapy_id' => $therapyId,
                    'therapy_text' => $therapyText,
                    'therapy_title' => $therapy->therapy_title,
                    'category' => $therapy->category,
                ]);
            }
        }
        if ($existingTherapies->isNotEmpty()) {
            $praxis->therapyClinics()->whereIn('therapy_id', $existingTherapies->keys())->delete();
        }
    }

    protected function handleOtherTherapies($praxis, $data) {
        if (empty($data['other_title'])) {
            return;
        }
        $processedIds = [];
    
        foreach ($data['other_title'] as $index => $therapyData) {
            if (!empty($therapyData)) {
                $category = $index < 3 ? 1 : 2;  // Если индекс меньше 3, категория будет 1, иначе 2
                $therapyOther = $praxis->therapyOthers()->updateOrCreate(
                    ['other_id' => $index],
                    [
                        'other_title' => $therapyData,
                        'other_text' => $data['other_text'][$index] ?? '',
                        'category' => $category,
                    ]
                );
                $processedIds[] = $therapyOther->id;
            }
        }
        $praxis->therapyOthers()->whereNotIn('id', $processedIds)->delete();
    }
}
