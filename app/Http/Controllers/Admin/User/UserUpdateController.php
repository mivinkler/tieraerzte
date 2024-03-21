<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserUpdateController extends Controller 
{
    public function __invoke(UpdateRequest $request, User $user) {

        $data = $request->validated();

        $user->update($data);

        return redirect()->route('admin.user.index', $user->id);
    }
}
