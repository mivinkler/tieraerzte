<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Filters\PraxisFilter;
use App\Http\Requests\Admin\FilterRequest;
use App\Models\Clinic;
use App\Models\User;
use App\Http\Controllers\Main\Controller;


class UserIndexController extends Controller
{
    public function __invoke() {
        
        $users = User::all();
        $praxen = Clinic::all();

        return view('admin.user.index', compact('praxen', 'users'));   
    }
}
