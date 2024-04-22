<?php

namespace App\Services\Praxis;

use App\Models\Clinic;
use App\Models\Therapy;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use App\Components\GeocodingClient;
use Illuminate\Support\Str;


class Service {
    public function store($data) {
        return $this->processPraxisData($data, new Clinic());
    }

    public function update($praxis, $data) {
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
        $slug = $this->generateSlug($data['title'], Clinic::class);
        $basicData = Arr::except($data, [
            'text_aboutus', 'title_one', 'text_one', 'title_two', 'text_two', 'title_three', 'text_three', 'text_sitebar',
            'therapy', 'therapy_text', 'therapy_other_id', 'therapy_other', 'therapy_other_text', 
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

    protected function generateSlug($title, $model) {
        $slug = Str::slug($title);
        $counter = 1;
        while ($model::where('slug', $slug)->exists()) {
            $slug = Str::slug($title) . '-' . $counter++;
        }
        return $slug;
    }

    protected function handleTexts($praxis, $data) {
        foreach (['text_aboutus', 'title_one', 'text_one', 'title_two', 'text_two', 'title_three', 'text_three', 'text_sitebar'] as $field) {
            if (isset($data[$field])) {
                $praxis->text()->updateOrCreate(['clinic_id' => $praxis->id], [$field => $data[$field]]);
            }
        }
    }
    
    protected function handleImage($praxis, $data) {
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('images', 'public');
            $praxis->images()->updateOrCreate(['clinic_id' => $praxis->id], ['foto_path' => $imagePath]);
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
                    'category_id' => $therapy->category,
                ]);
            }
        }
        if ($existingTherapies->isNotEmpty()) {
            $praxis->therapyClinics()->whereIn('therapy_id', $existingTherapies->keys())->delete();
        }
    }

    protected function handleOtherTherapies($praxis, $data) {
        if (empty($data['therapy_other'])) {
            return;
        }
        $processedIds = [];
    
        foreach ($data['therapy_other'] as $index => $therapyData) {
            if (!empty($therapyData)) {
                $category = $index < 3 ? 1 : 2;  // Если индекс меньше 3, категория будет 1, иначе 2
                $therapyOther = $praxis->therapyOthers()->updateOrCreate(
                    ['therapy_other_id' => $index],
                    [
                        'therapy_other' => $therapyData,
                        'therapy_other_text' => $data['therapy_other_text'][$index] ?? '',
                        'category' => $category,
                    ]
                );
                $processedIds[] = $therapyOther->id;
            }
        }
        $praxis->therapyOthers()->whereNotIn('id', $processedIds)->delete();
    }
}
