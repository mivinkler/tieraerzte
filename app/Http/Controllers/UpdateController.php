<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


class UpdateController extends Controller 
{
    public function update(Clinic $praxis) {        
        
        $data = request()->validate([
            'title' => 'string',
            'street' => 'string',
            'postcode' => 'string',
            'locality' => 'string',
            'tel' => 'string',
            'email' => 'string',
        ]);
    
        $praxis->update($data);

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
        
        $praxis->focus()->update($focusData);

        
        $textData = request()->validate([
            'freitext_aboutus' => 'nullable|string',
            'freitext_one' => 'nullable|string',
            'freitext_two' => 'nullable|string',
            'freitext_search' => 'nullable|string',
        ]);
        
        $praxis->text()->update($textData);


        $OtherData = request()->validate([
            'other_one' => 'nullable|string',
            'other_two' => 'nullable|string',
        ]);

        $praxis->serviceOthers()->update($OtherData);


        if (request()->hasFile('image')) {
            $imagePathImages = Storage::disk('public')->put('/images', request()->file('image'));
            
            $praxis->images()->update(['foto_path' => $imagePathImages]);
        }  

        if (request()->has("services")) {
            $serviceIds = request()->input('services');
            $serviceData = request()->input('service_text');
        
            // Удаление тех связей, которых нет в новых данных
            $praxis->ClinicServices()->whereNotIn('service_id', $serviceIds)->delete();
        
            foreach ($serviceIds as $serviceId) {
                $serviceText = $serviceData[$serviceId] ?? null;
        
                $service = Service::find($serviceId);
        
                if ($service) {
                    $serviceTitle = $service->service_title;
        
                    $praxis->ClinicServices()->updateOrCreate(
                        ['service_id' => $serviceId],
                        ['service_title' => $serviceTitle, 'service_text' => $serviceText]
                    );
                }
            }   
        }
        return redirect()->route('praxis.show', ['praxis' => $praxis->id]);
    }
}
