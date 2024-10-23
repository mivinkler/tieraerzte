<?php

namespace App\Services\Praxis;

use App\Models\Clinic;
use App\Models\TherapyList;
use App\Models\NursingList;
use App\Models\ServiceList;
use App\Models\DeviceList;
use App\Models\AnimalList;
use App\Models\LanguageList;
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
use GuzzleHttp\Client;

class Service {
    public function createClinic($data) {
        return $this->processPraxisData($data, new Clinic());
    }

    public function updateClinic($praxis, $data) {
        return $this->processPraxisData($data, $praxis);
    }

    protected function processPraxisData($data, Clinic $praxis) {
        // try {
            DB::beginTransaction();

            $praxis->fill($this->prepareBasicData($data))->save();

            $this->handleDynamicData($praxis, $data);

            DB::commit();
            return $praxis;

        // } catch (Exception $exception) {
        //     DB::rollback();
        //     Log::error($exception->getMessage());
        //     throw new Exception('Failed to process Praxis data');
        // }
    }

    protected function prepareBasicData($data) {
        $slug = Str::slug($data['title']);
        $basicData = Arr::except($data, [
            'text_aboutus', 'title_one', 'text_one', 'title_two', 'text_two', 'title_three', 'text_three', 'text_sitebar',
            'monday_start1', 'monday_end1', 'monday_start2', 'monday_end2',
            'tuesday_start1', 'tuesday_end1', 'tuesday_start2', 'tuesday_end2',
            'wednesday_start1', 'wednesday_end1', 'wednesday_start2', 'wednesday_end2',
            'thursday_start1', 'thursday_end1', 'thursday_start2', 'thursday_end2',
            'friday_start1', 'friday_end1', 'friday_start2', 'friday_end2',
            'saturday_start1', 'saturday_end1', 'saturday_start2', 'saturday_end2',
            'sunday_start1', 'sunday_end1', 'sunday_start2', 'sunday_end2',
            'days_interval', 'postscript',
            'therapy', 'therapy_text', 'therapy_other_id', 'therapy_other_title', 'therapy_other_text',
            'nursing', 'nursing_text', 'nursing_other_id', 'nursing_other_title', 'nursing_other_text',
            'service', 'device', 'animal', 'language',
            'image'
        ]);
        $basicData['slug'] = $slug;
    
        return $basicData;
    }

    protected function handleDynamicData($praxis, $data) {
        $this->handleTexts($praxis, $data);
        $this->handleImage($praxis, $data);
        $this->handleGeoCoordinates($praxis, $data);
        $this->handleMapImage($praxis, $data);
        $this->handleWorkTime($praxis, $data);
        $this->handleTimeInterval($praxis, $data);
        $this->handleTherapies($praxis, $data);
        $this->handleOtherTherapies($praxis, $data);
        $this->handleNursing($praxis, $data);
        $this->handleOtherNursing($praxis, $data);
        $this->handleService($praxis, $data);
        $this->handleDevice($praxis, $data);
        $this->handleAnimal($praxis, $data);
        $this->handleLanguage($praxis, $data);
    }

    protected function handleTexts($praxis, $data) {
        foreach (['text_aboutus', 'title_one', 'text_one', 'title_two', 'text_two', 'title_three', 'text_three', 'text_sitebar'] as $field) {
            if (isset($data[$field])) {
                $praxis->text()->updateOrCreate(['clinic_id' => $praxis->id], [$field => $data[$field]]);
            }
        }
    }

    protected function handleWorkTime($praxis, $data) {
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    
        foreach ($days as $day) {
            $workTimeData = [
                "{$day}_start1" => $data["{$day}_start1"] ?? null,
                "{$day}_end1" => $data["{$day}_end1"] ?? null,
                "{$day}_start2" => $data["{$day}_start2"] ?? null,
                "{$day}_end2" => $data["{$day}_end2"] ?? null,
            ];
            
            $praxis->timeTable()->updateOrCreate(['clinic_id' => $praxis->id], $workTimeData);
        }
    }

    protected function handleTimeInterval($praxis, $data) {    
        $days_interval = $data["days_interval"];
        
        $praxis->timeInterval()->updateOrCreate(
            ['clinic_id' => $praxis->id], 
            ['days_interval' => $days_interval]
        );
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
                ->resize(220, 220)
                ->save(storage_path('app/public/images/' . $name));
            
            // Обновляем или создаем запись в базе данных с путем к файлу
            $praxis->images()->updateOrCreate(['clinic_id' => $praxis->id], ['foto_path' => $path]);
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
    
                $this->handleMapImage($praxis, $coordinates);
            }
        }
    }
    
    protected function handleMapImage($praxis, $coordinates) {
        if ($coordinates && isset($coordinates['latitude'], $coordinates['longitude'])) {
            Log::info('handleMapImage called with coordinates', $coordinates);
    
            $latitude = $coordinates['latitude'];
            $longitude = $coordinates['longitude'];
            $name = md5(Carbon::now() . '_' . $praxis->id . '_map') . '.png';
            
            Log::info("Generated map image name: {$name}");
    
            $client = new Client();
            try {
                $response = $client->get("https://maps.googleapis.com/maps/api/staticmap", [
                    'query' => [
                        'center' => "$latitude,$longitude",
                        'zoom' => 12,
                        'size' => '220x220',
                        'key' => env('GOOGLE_MAPS_API_KEY'), // Использование API ключа из .env
                        'markers' => "size:mid|color:red|label:A;|$latitude,$longitude",
                        'style' => [
                            'feature:poi|element:labels|visibility:off',
                            'feature:transit|element:labels|visibility:off'
                        ]
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) {
                    $mapImage = $response->getBody()->getContents();
                    $path = 'images/' . $name;
                    Log::info("Saving map image to: storage_path('app/public/' . $path)");
    
                    file_put_contents(storage_path('app/public/' . $path), $mapImage);
    
                    $praxis->images()->updateOrCreate(
                        ['clinic_id' => $praxis->id],
                        ['map_path' => $path]
                    );
                    Log::info('Map image saved and database updated successfully.');
                } else {
                    Log::error('Error fetching map image from Google Maps API', [
                        'status_code' => $response->getStatusCode(),
                        'response' => $response->getBody()->getContents()
                    ]);
                }
            } catch (Exception $e) {
                Log::error('Exception occurred while fetching map image', ['message' => $e->getMessage()]);
            }
        } else {
            Log::error('Invalid coordinates for map image creation', $coordinates);
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
            $therapyList = TherapyList::find($therapyId);
            
            $existingTherapy = $existingTherapies->pull($therapyId);

            if ($existingTherapy && $existingTherapy->therapy_text !== $therapyText) {
                $existingTherapy->update(['therapy_text' => $therapyText]);
            } elseif (!$existingTherapy) {
                $praxis->therapyClinics()->create([
                    'therapy_id' => $therapyId,
                    'therapy_title' => $therapyList->therapy_title,
                    'therapy_text' => $therapyText,
                ]);
            }
        }
        if ($existingTherapies->isNotEmpty()) {
            $praxis->therapyClinics()->whereIn('therapy_id', $existingTherapies->keys())->delete();
        }
    }

    protected function handleOtherTherapies($praxis, $data) {
        if (empty($data['therapy_other_title'])) {
            return;
        }
        $processedIds = [];
        
        foreach ($data['therapy_other_title'] as $index => $therapyData) {
            if (!empty($therapyData)) {
                $therapyOther = $praxis->therapyOthers()->updateOrCreate(
                    ['therapy_other_id' => $index],
                    [
                        'therapy_other_title' => $therapyData,
                        'therapy_other_text' => $data['therapy_other_text'][$index] ?? '',
                    ]
                );
                $processedIds[] = $therapyOther->id;
            }
        }
        $praxis->therapyOthers()->whereNotIn('id', $processedIds)->delete();
    }

    protected function handleNursing($praxis, $data) {
        if (empty($data['nursing'])) {
            return;
        }
        $therapiesData = $data['nursing'] ?? [];
        $existingTherapies = $praxis->nursingClinics()->get()->keyBy('nursing_id');

        foreach ($therapiesData as $nursingId) {
            $nursingText = $data['nursing_text'][$nursingId] ?? null;
            $nursingList = NursingList::find($nursingId);
            
            $existingNursing = $existingTherapies->pull($nursingId);

            if ($existingNursing && $existingNursing->nursing_text !== $nursingText) {
                $existingNursing->update(['nursing_text' => $nursingText]);
            } elseif (!$existingNursing) {
                $praxis->nursingClinics()->create([
                    'nursing_id' => $nursingId,
                    'nursing_title' => $nursingList->nursing_title,
                    'nursing_text' => $nursingText,
                ]);
            }
        }
        if ($existingTherapies->isNotEmpty()) {
            $praxis->therapyClinics()->whereIn('nursing_id', $existingTherapies->keys())->delete();
        }
    }

    protected function handleOtherNursing($praxis, $data) {
        if (empty($data['nursing_other_title'])) {
            return;
        }
        $processedIds = [];
        
        foreach ($data['nursing_other_title'] as $index => $nursingData) {
            if (!empty($nursingData)) {
                $nursingOther = $praxis->nursingOthers()->updateOrCreate(
                    ['nursing_other_id' => $index],
                    [
                        'nursing_other_title' => $nursingData,
                        'nursing_other_text' => $data['nursing_other_text'][$index] ?? '',
                    ]
                );
                $processedIds[] = $nursingOther->id;
            }
        }
        $praxis->nursingOthers()->whereNotIn('id', $processedIds)->delete();
    }

    protected function handleService($praxis, $data) {
        // Получение идентификаторов устройств из данных
        $serviceIds = $data['service'] ?? [];
    
        // Получение текущих устройств из базы данных
        $existingServices = $praxis->serviceClinics->pluck('service_id')->toArray();
    
        // Определение новых устройств, которые нужно добавить
        $newServiceIds = array_diff($serviceIds, $existingServices);
    
        // Определение устройств, которые нужно удалить
        $serviceIdsToDelete = array_diff($existingServices, $serviceIds);
    
        // Массовое добавление новых устройств
        if (!empty($newServiceIds)) {
            $newServices = ServiceList::whereIn('id', $newServiceIds)->get()->map(function($service) use ($praxis) {
                return [
                    'service_id' => $service->id,
                    'service_title' => $service->service_title,
                    'clinic_id' => $praxis->id,
                ];
            })->toArray();
    
            $praxis->serviceClinics()->insert($newServices);
        }
    
        // Массовое удаление старых устройств
        if (!empty($serviceIdsToDelete)) {
            $praxis->serviceClinics()->whereIn('service_id', $serviceIdsToDelete)->delete();
        }
    }

    protected function handleDevice($praxis, $data) {
        // Получение идентификаторов устройств из данных
        $deviceIds = $data['device'] ?? [];
    
        // Получение текущих устройств из базы данных
        $existingDevices = $praxis->deviceClinics->pluck('device_id')->toArray();
    
        // Определение новых устройств, которые нужно добавить
        $newDeviceIds = array_diff($deviceIds, $existingDevices);
    
        // Определение устройств, которые нужно удалить
        $deviceIdsToDelete = array_diff($existingDevices, $deviceIds);
    
        // Массовое добавление новых устройств
        if (!empty($newDeviceIds)) {
            $newDevices = DeviceList::whereIn('id', $newDeviceIds)->get()->map(function($device) use ($praxis) {
                return [
                    'device_id' => $device->id,
                    'device_title' => $device->device_title,
                    'clinic_id' => $praxis->id,
                ];
            })->toArray();
    
            $praxis->deviceClinics()->insert($newDevices);
        }
    
        // Массовое удаление старых устройств
        if (!empty($deviceIdsToDelete)) {
            $praxis->deviceClinics()->whereIn('device_id', $deviceIdsToDelete)->delete();
        }
    }

    protected function handleAnimal($praxis, $data) {
        $animalIds = $data['animal'] ?? [];
    
        $existingAnimals = $praxis->animalClinics->pluck('animal_id')->toArray();
    
        $newAnimalIds = array_diff($animalIds, $existingAnimals);
        $animalIdsToDelete = array_diff($existingAnimals, $animalIds);
    
        if (!empty($newAnimalIds)) {
            $newAnimals = AnimalList::whereIn('id', $newAnimalIds)->get()->map(function($animal) use ($praxis) {
                return [
                    'animal_id' => $animal->id,
                    'animal_title' => $animal->animal_title,
                    'clinic_id' => $praxis->id,
                ];
            })->toArray();
    
            $praxis->animalClinics()->insert($newAnimals);
        }
    
        if (!empty($animalIdsToDelete)) {
            $praxis->animalClinics()->whereIn('animal_id', $animalIdsToDelete)->delete();
        }
    }

    protected function handleLanguage($praxis, $data) {
        $languageIds = $data['language'] ?? [];
    
        $existingLanguages = $praxis->languageClinics->pluck('language_id')->toArray();
    
        $newLanguageIds = array_diff($languageIds, $existingLanguages);
        $languageIdsToDelete = array_diff($existingLanguages, $languageIds);
    
        if (!empty($newLanguageIds)) {
            $newLanguages = LanguageList::whereIn('id', $newLanguageIds)->get()->map(function($language) use ($praxis) {
                return [
                    'language_id' => $language->id,
                    'language_title' => $language->language_title,
                    'clinic_id' => $praxis->id,
                ];
            })->toArray();
    
            $praxis->languageClinics()->insert($newLanguages);
        }
    
        if (!empty($languageIdsToDelete)) {
            $praxis->languageClinics()->whereIn('language_id', $languageIdsToDelete)->delete();
        }
    }
}