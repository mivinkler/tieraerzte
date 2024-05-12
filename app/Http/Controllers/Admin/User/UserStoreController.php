<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class UserStoreController extends Controller 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();

        $password = Str::random(8);
        $data['password'] = Hash::make($password);
        $data['role'] = 1;

        DB::beginTransaction();

        try {
            User::firstOrCreate(['email' => $data['email']], $data);
            Mail::to($data['email'])->send(new PasswordMail($password));

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();  
            Log::error('Error creating user: ' . $exception->getMessage());

            return redirect()->back()->with('error', 'Failed to create user.');
        }
        return redirect()->route('admin.user.index');
    }
}
