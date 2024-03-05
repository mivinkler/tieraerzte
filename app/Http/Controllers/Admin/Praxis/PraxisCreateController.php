<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Therapy;
use App\Models\TherapyOther;
use Requests;

class PraxisCreateController extends Controller 
{
    public function __invoke() {
        $therapies = Therapy::all();

        $users = User::all();
        
        return view('admin.praxis.create', compact('therapies', 'users'));
    }
}

