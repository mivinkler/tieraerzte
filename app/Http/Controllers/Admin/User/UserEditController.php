<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserEditController extends Controller 
{
    public function __invoke(User $user) {

        $roles = User::getRoles();

        $users = Auth::user();

        return view('admin.user.user_form', compact('user', 'roles'));
    }
}
