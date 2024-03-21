<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Models\User;

class UserDestroyController extends Controller
{
    public function __invoke(User $user) 
    {
        $user->delete();
        
        return redirect()->route('admin.user.index');
    }
}
