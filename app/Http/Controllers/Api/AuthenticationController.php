<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:32',
            'email' => 'required|email|min:5|max:32',
            'password' => 'required|min:3|max:32|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json($validator->errors());
        }

        $user = $this->userRepository
            ->registerUser($request->only(['name', 'email', 'password']));

        return Response::json($user);
    }
}
