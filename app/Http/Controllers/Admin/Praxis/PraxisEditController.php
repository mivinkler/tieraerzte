<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;

class PraxisEditController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        $therapies = Therapy::all();
        $otherTherapies = $praxis->clinicTherapies->where('therapy_id', 99);
        
        return view('admin.praxis.update', compact('therapies', 'praxis', 'otherTherapies'));
    }
}
