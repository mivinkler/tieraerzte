<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class UserStoreController extends Controller 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();

        $password = Str::random(8);
        $data['password'] = Hash::make($password);
        $data['role'] = 1;

        User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email'])->send(new PasswordMail($password));

        return redirect()->route('admin.user.index');
    }
}
