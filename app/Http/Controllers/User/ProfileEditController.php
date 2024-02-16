<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\User;

class ProfileEditController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        $therapies = Therapy::all();
        $user = User::all();

        return view('praxis.profile.edit', compact('praxis', 'user'));
    }
}
