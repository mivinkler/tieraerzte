<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Models\User;

class UserEditController extends Controller 
{
    public function __invoke(User $user) {

        $roles = User::getRoles();
        
        return view('admin.user.update', compact('user', 'roles'));
    }
}
