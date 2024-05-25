<?php

namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;

class EditController extends Controller 
{
    public function __invoke(Clinic $praxis) {

        $therapies = Therapy::all();
        $therapyOthers = $praxis->therapyOthers()->get();

        return view('user.praxis_form', compact('praxis', 'therapies', 'therapyOthers'));
    }
}
