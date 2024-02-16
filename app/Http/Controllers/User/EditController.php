<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\User;

class EditController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        $therapies = Therapy::all();
        $users = User::all();
        
        return view('users.praxis.edit', compact('therapies', 'praxis', 'users'));
    }
}
