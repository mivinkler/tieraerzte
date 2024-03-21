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
    public function store($data) 
    {  
        try {
            DB::beginTransaction();
    
            $name = $data['title'];

            $slug = Str::slug($name);
            $originalSlug = $slug;
    
            $counter = 0;
            while (Clinic::where('slug', $slug)->exists()) {
                $counter++;
                $slug = $originalSlug . '-' . $counter;
            }
    
            $data['slug'] = $slug;

            $praxisData = Arr::except($data, [
                'text_aboutus', 
                'text_one', 
                'image', 
                'therapy', 
                'therapy_text', 
                'other_therapy', 
                'other_therapy_text',
            ]);
            $praxis = Clinic::create($praxisData);
    
            if (isset($data['text_aboutus'], $data['text_one'])) {
                $praxis->text()->create([
                    'text_aboutus' => $data['text_aboutus'],
                    'text_one' => $data['text_one'],
                ]);
            }
    
            if (isset($data['image'])) {
                $imagePath = $data['image']->store('images', 'public');
                $praxis->images()->create([
                    'clinic_id' => $praxis->id, 
                    'foto_path' => $imagePath,
                ]);
            }
    
            if (isset($data['therapy'])) {
                $therapyIds = $data['therapy'];
                $therapies = Therapy::findMany($therapyIds)->keyBy('id');
    
                foreach ($therapyIds as $therapyId) {  
                    if (isset($therapies[$therapyId])) {            
                        $therapy = $therapies[$therapyId];
                        $therapyText = $data['therapy_text'][$therapyId] ?? null;
                        $praxis->clinicTherapies()->create([
                            'therapy_id' => $therapyId,
                            'therapy_text' => $therapyText,
                            'therapy_title' => $therapy->therapy_title,
                        ]);
                    }
                }    
            }

            if (isset($data['other_therapy'])) {
                foreach ($data['other_therapy'] as $index => $therapyTitle) {
                    if (isset($therapyTitle)) {
                        $therapyText = $data['other_therapy_text'][$index] ?? null;
                        $praxis->clinicTherapies()->create([
                            'therapy_id' => 99,
                            'therapy_title' => $therapyTitle,
                            'therapy_text' => $therapyText,
                        ]);
                    }
                }
            }
    
            $address = $data['street'] . ' ' . $data['house'] . ', ' . $data['locality'] . ', ' . $data['postcode'] . ', Germany';
            $geocodingClient = new GeocodingClient();
            $coordinates = $geocodingClient->getCoordinatesByAddress($address);
    
            if ($coordinates) {
                $praxis->geoCoordinates()->create([
                    'latitude' => $coordinates['latitude'],
                    'longitude' => $coordinates['longitude'],
                ]);
            }

            DB::commit();
            return $praxis;

        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
            abort(500, 'Internal Server Error');
        }
    }

    public function update($praxis, $data) 
    {
        try {
            DB::beginTransaction();

            $praxisData = Arr::except($data, [
                'text_aboutus', 
                'text_one', 
                'image', 
                'therapy', 
                'therapy_text', 
                'other_therapy', 
                'other_therapy_text', 

            ]);
            $praxis->update($praxisData);

            if (isset($data['text_aboutus'], $data['text_one'])) {
                $praxis->text()->update([
                    'text_aboutus' => $data['text_aboutus'],
                    'text_one' => $data['text_one'],
                ]);
            }

            if (isset($data['image'])) {
                $imagePath = $data['image']->store('images', 'public');
                $praxis->images()->updateOrCreate([], ['foto_path' => $imagePath]);
            }

            if (isset($data['therapy'])) {
                $praxis->clinicTherapies()->where('therapy_id', '!=', 99)->whereNotIn('therapy_id', $data['therapy'])->delete();
            
                foreach ($data['therapy'] as $therapyId) {
                    $therapyText = $data['therapy_text'][$therapyId] ?? null;
                    $therapyTitle = Therapy::find($therapyId)->therapy_title ?? '';
                    $praxis->clinicTherapies()->updateOrCreate(
                        ['therapy_id' => $therapyId],
                        ['therapy_text' => $therapyText, 'therapy_title' => $therapyTitle]
                    );
                }
            }
            
            if (isset($data['other_therapy'])) {
                $validOtherTherapies = array_filter($data['other_therapy'], fn($title) => !empty($title));
                $praxis->clinicTherapies()->where('therapy_id', 99)->whereNotIn('others', array_keys($validOtherTherapies))->delete();
            
                foreach ($validOtherTherapies as $index => $otherTherapyTitle) {
                    $otherTherapyText = $data['other_therapy_text'][$index] ?? null;
            
                    $praxis->clinicTherapies()->updateOrCreate(
                        ['therapy_id' => 99, 'others' => $index],
                        ['therapy_text' => $otherTherapyText, 'therapy_title' => $otherTherapyTitle]
                    );
                }
            }

            DB::commit();
            return $praxis;

        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
            abort(500);
        }
    }
}

