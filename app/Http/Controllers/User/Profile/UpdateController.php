<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;


class UpdateController extends Controller 
{
    public function __invoke(UpdateRequest $request, User $user) {        
        
        $data = $request->validated();
        
        $user->update($data);

        return redirect()->route('profile.edit', ['user' => $user->id]);
    }
}
