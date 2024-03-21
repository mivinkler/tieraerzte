<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\User;
use App\Models\Therapy;


class PraxisCreateController extends Controller 
{
    public function __invoke() {

        $therapies = Therapy::all();

        $users = User::all();
        
        return view('admin.praxis.create', compact('therapies', 'users'));
    }
}

