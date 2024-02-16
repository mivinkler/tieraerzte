<?php

namespace App\Services\Praxis;
use App\Models\Clinic;
use App\Models\Therapy;

class Service {
    public function store($data) {
          
        $text_aboutus = $data['text_aboutus'];
        $text_one = $data['text_one'];
        $image = $data['image'] ?? null;
        $therapyIds = $data['therapy'] ?? null;
        $therapyTextInput = $data['therapy_text'];
        $other_one = $data['other_one'];
        $other_text_one = $data['other_text_one'];
        $other_two = $data['other_two'];
        $other_text_two = $data['other_text_two'];

        unset(
            $data['text_aboutus'], 
            $data['text_one'], 
            $data['image'], 
            $data['therapy'],
            $data['therapy_text'],
            $data['other_one'],
            $data['other_text_one'],
            $data['other_two'],
            $data['other_text_two'],
        );

        $praxis = Clinic::create($data);
        

        $praxis->text()->create([
            'text_aboutus' => $text_aboutus,
            'text_one' => $text_one,
        ]);

        if ($image) {
            $imagePath = $image->store('images', 'public');
            $praxis->Images()->create([
                'clinic_id' => $praxis->id, 
                'foto_path' => $imagePath]
            );
        }

        if ($therapyIds) {   
            foreach ($therapyIds as $therapyId) {
                
                $therapyText = $therapyTextInput[$therapyId];
                $therapy = Therapy::find($therapyId);
                $therapyTitle = $therapy->therapy_title;
    
                $praxis->clinicTherapies()->create([
                    'therapy_id' => $therapyId,
                    'therapy_title' => $therapyTitle, 
                    'therapy_text' => $therapyText,
                ]);
            }   
        }

        $praxis->therapyOthers()->create([
            'other_one' => $other_one,
            'other_text_one' => $other_text_one,
            'other_two' => $other_two,
            'other_text_two' => $other_text_two,

        ]);


        return $praxis;


        // $focusData = request()->validate([
        //     'focus_headline' => 'nullable|string',
        //     'focus_title_one' => 'nullable|string',
        //     'focus_text_one' => 'nullable|string',
        //     'focus_title_two' => 'nullable|string',
        //     'focus_text_two' => 'nullable|string',            
        //     'focus_title_three' => 'nullable|string',
        //     'focus_text_three' => 'nullable|string', 
        //     'focus_title_four' => 'nullable|string',
        //     'focus_text_four' => 'nullable|string', 
        // ]);
        
        // $praxis->focus()->create($focusData);

    }


    public function update($praxis, $data) {

        $text_aboutus = $data['text_aboutus'];
        $text_one = $data['text_one'];
        $image = $data['image'] ?? null;
        $therapyIds = $data['therapy'] ?? null;
        $therapyTextInput = $data['therapy_text'];
        $other_one = $data['other_one'];
        $other_text_one = $data['other_text_one'];
        $other_two = $data['other_two'];
        $other_text_two = $data['other_text_two'];

        unset(
            $data['text_aboutus'], 
            $data['text_one'], 
            $data['image'], 
            $data['therapy'],
            $data['therapy_text'],
            $data['other_one'],
            $data['other_text_one'],
            $data['other_two'],
            $data['other_text_two'],
        );
    
        $praxis->update($data);

        $praxis->text()->update([
            'text_aboutus' => $text_aboutus,
            'text_one' => $text_one,
        ]);

        if ($image) {
            $imagePath = $image->store('images', 'public');
            $praxis->Images()->update([
                'foto_path' => $imagePath,
            ]);
        };


        if ($therapyIds) {   
            foreach ($therapyIds as $therapyId) {
                
                $therapyText = $therapyTextInput[$therapyId];
                $therapy = Therapy::find($therapyId);
                $therapyTitle = $therapy->therapy_title;

                $praxis->clinicTherapies()->whereNotIn('therapy_id', $therapyIds)->delete();
    
                $praxis->clinicTherapies()->updateOrCreate(
                    ['therapy_id' => $therapyId],
                    ['therapy_title' => $therapyTitle, 'therapy_text' => $therapyText]
                );
            }   
        }

        $praxis->therapyOthers()->update([
            'other_one' => $other_one,
            'other_text_one' => $other_text_one,
            'other_two' => $other_two,
            'other_text_two' => $other_text_two,

        ]);
    }
}

