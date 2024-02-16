<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\TherapyOther;

class PraxisEditController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        $therapies = Therapy::all();
        $therapyOthers = TherapyOther::all();
        
        return view('admin.praxis.update', compact('therapies', 'praxis'));
    }
}
