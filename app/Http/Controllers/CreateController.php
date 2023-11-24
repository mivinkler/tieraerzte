<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Area;

class CreateController extends Controller 
{

    public function create() {  
        $areas = Area::all();
        return view('praxis.create', compact('areas'));
    }

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'street' => 'string',
            'postcode' => 'string',
            'locality' => 'string',
            'tel' => 'string',
            'email' => 'string',
            'areas_title' => 'array',
        ]);
        
        

        unset($data['areas_title']);

        $clinic = Clinic::create($data);

        foreach ($data['areas_title'] as $areaTitle) {

            $area = new Area(['title' => $areaTitle]);
            $clinic->areas()->save($area);
        }
    
        return redirect()->route('praxis.create');


    }
}

