<?php
namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function profile()
    {
        $user = new UserResource(auth()->user());
        return rest_api($user);
    }
}