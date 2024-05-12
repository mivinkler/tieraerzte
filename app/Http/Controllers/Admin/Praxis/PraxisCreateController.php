<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Therapy;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PraxisCreateController extends Controller 
{
    public function __invoke() {

        $therapies = Therapy::all();
        $roles = User::getRoles();

        $layout = (Auth::user() && Auth::user()->role === User::ROLE_ADMIN) ? 'layouts.admin' : 'layouts.user';
        
        return view('admin.praxis.praxis_form', compact('layout', 'therapies', 'roles'));
    }
}

