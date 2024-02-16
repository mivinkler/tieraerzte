<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\TherapyOther;


class PraxisCreateController extends Controller 
{
    public function __invoke() {
        $therapies = Therapy::all();
        $therapyOthers = TherapyOther::all();
        $praxis = Clinic::first();

        return view('admin.praxis.create', compact('therapies', 'praxis'));
    }
}

