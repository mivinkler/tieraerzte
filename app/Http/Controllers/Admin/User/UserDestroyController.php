<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;

class UserDestroyController extends BaseController
{
    public function __invoke(User $user) {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
