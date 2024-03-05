<?php

namespace App\Services\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Service {
    public function store($data) { 
        try {
            DB::beginTransaction();
            $user = User::create([
                'role' => 'user',
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            DB::commit();
            return $user;

        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
            abort(500, 'Internal Server Error');
        }
    }

    public function update($user, $data) {
        try {
            DB::beginTransaction();

            $updateData = [];
            if (isset($data['name'])) {
                $updateData['name'] = $data['name'];
            }
            if (isset($data['email'])) {
                $updateData['email'] = $data['email'];
            }
            if (isset($data['password'])) {
                $updateData['password'] = Hash::make($data['password']);
            }
            if (isset($updateData)) {
                $user->update($updateData);
            }

            DB::commit();
            return $user;

        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
            abort(500, 'Internal Server Error');
        }
    }
}

