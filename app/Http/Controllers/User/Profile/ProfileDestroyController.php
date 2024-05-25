<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Main\Controller;
use App\Models\User;

class ProfileDestroyController extends Controller
{
    public function __invoke(User $user) 
    {
        $user->delete();
        
        return redirect()->route('admin.user.index');
    }
}
