<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;

use App\Models\Therapy;



class UserCreateController extends Controller 
{
    public function __invoke() {
        $therapies = Therapy::all();

        return view('admin.user.create', compact('therapies'));
    }
}

