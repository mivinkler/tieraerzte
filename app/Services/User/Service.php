<?php

namespace App\Services\User;
use App\Models\User;

class Service {
    public function store($data) {
          
        $gender = $data['gender'] ?? null;
        $name = $data['name'] ?? null;
        $role = $data['image'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        $user = User::create($data);

        return $user;

    }

    public function update($user, $data) {

        $gender = $data['gender'] ?? null;
        $name = $data['name'] ?? null;
        $role = $data['image'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
    
        $user->update($data);
    }
}

