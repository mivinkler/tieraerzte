<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Main\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileEditController extends Controller 
{
    public function __invoke(User $user) {

        $roles = User::getRoles();

        $users = Auth::user();

        // $layout = (Auth::user()->role === User::ROLE_ADMIN) ? 'layouts.admin' : 'layouts.user';

        return view('user.profile_form', compact('user', 'roles'));
    }
}
