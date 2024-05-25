<?php

namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Therapy;
use App\Models\User;

class CreateController extends Controller 
{
    public function __invoke() {

        $therapies = Therapy::all();
        $roles = User::getRoles();

        return view('user.praxis_form', compact('therapies', 'roles'));
    }
}

