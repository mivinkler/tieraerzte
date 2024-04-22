<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserCreateController extends Controller 
{
    public function __invoke() 
    {
        $layout = (Auth::user()->role === User::ROLE_ADMIN) ? 'layouts.admin' : 'layouts.user';

        return view('admin.user.user_form', compact('layout'));
    }
}
