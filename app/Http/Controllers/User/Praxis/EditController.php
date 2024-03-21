<?php

namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\User;

class EditController extends Controller 
{
    public function __invoke(Clinic $praxis) {

        $therapies = Therapy::all();
        $users = User::all();
        
        $otherTherapies = $praxis->clinicTherapies->where('therapy_id', 99);

        return view('user.praxis.update', compact('therapies', 'praxis', 'users', 'otherTherapies'));
    }
}
