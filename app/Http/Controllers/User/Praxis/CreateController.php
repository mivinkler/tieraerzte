<?php

namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;


class CreateController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        
        $therapies = Therapy::all();

        return view('user.praxis.create', compact('therapies'));
    }
}

