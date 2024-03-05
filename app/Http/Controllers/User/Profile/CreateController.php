<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Main\Controller;
use App\Models\User;


class CreateController extends Controller 
{
    public function __invoke(User $user) {

        return view('user.profile.create', compact('user'));
    }
}

