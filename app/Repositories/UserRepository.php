<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function registerUser($userData){
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            'avatar' => $this->generateAvatarUrl($userData['name'])
        ]);
    }

    public function generateAvatarUrl($name){
        return "https://ui-avatars.com/api/?name=" . urlencode($name);
    }
}
