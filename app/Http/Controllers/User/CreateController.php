<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\TherapyOther;

class CreateController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        $therapies = Therapy::all();
        $therapyOthers = TherapyOther::all();
        $praxis = Clinic::first();

        return view('users.praxis.create', compact('therapies', 'praxis'));
    }
}

