<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller 
{
    public function store(Clinic $praxis) {        
        
        $data = request()->validate([
            'title' => 'string',
            'street' => 'string',
            'postcode' => 'string',
            'locality' => 'string',
            'tel' => 'string',
            'email' => 'string',
        ]);
    
        $praxis = Clinic::create($data);

        $focusData = request()->validate([
            'focus_headline' => 'nullable|string',
            'focus_title_one' => 'nullable|string',
            'focus_text_one' => 'nullable|string',
            'focus_title_two' => 'nullable|string',
            'focus_text_two' => 'nullable|string',            
            'focus_title_three' => 'nullable|string',
            'focus_text_three' => 'nullable|string', 
            'focus_title_four' => 'nullable|string',
            'focus_text_four' => 'nullable|string', 
        ]);
        
        $praxis->focus()->create($focusData);

        
        $textData = request()->validate([
            'freitext_aboutus' => 'nullable|string',
            'freitext_one' => 'nullable|string',
            'freitext_two' => 'nullable|string',
            'freitext_search' => 'nullable|string',
        ]);
        
        $praxis->text()->create($textData);


        $OtherData = request()->validate([
            'other_one' => 'nullable|string',
            'other_two' => 'nullable|string',
        ]);

        $praxis->serviceOthers()->create($OtherData);


        if (request()->hasFile('image')) {
            $imagePathImages = Storage::disk('public')->put('/images', request()->file('image'));
            optional($praxis->images())->create(['foto_path' => $imagePathImages]);
        }

        if (request()->has("services")) {
            $serviceIds = request()->input('services');
            // в форме "service_text[{{ $service->id }}])", Laravel автоматически ассоциирует значения с ключами массива, поэтому id текcта равно id сервиса 
            $serviceData = request()->input('service_text');
            foreach ($serviceIds as $serviceId) {
                // извлекаем текст текущей услуги из массива
                $serviceText = $serviceData[$serviceId] ?? null;
        
                // Проверяем, существует ли запись для данного $serviceId
                $service = Service::find($serviceId);
        
                if ($service) {
                    // Если запись существует, используем ее "service_title" из модели ervice
                    $serviceTitle = $service->service_title;
        
                    $praxis->ClinicServices()->create([
                        'service_id' => $serviceId,
                        'service_title' => $serviceTitle,
                        'service_text' => $serviceText,
                    ]);
                }
            }   
        }
        return redirect()->route('praxis.show', ['praxis' => $praxis->id]);
    }
}

