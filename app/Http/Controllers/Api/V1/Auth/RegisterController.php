<?php
namespace App\Http\Controllers\Api\V1\Auth;

use App\Domain\UserManagements\Application\UserApplication;
use App\Domain\UserManagements\Model\UserModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    protected $userApplication;

    public function __construct(UserApplication $userApplication)
    {
        $this->userApplication = $userApplication;
    }

    public function register(RegisterRequest $request)
    {
        $model = new UserModel();
        $model->name     = $request->name;
        $model->email    = $request->email;
        $model->password = $request->password;
        $user = $this->userApplication->register($model);

        return rest_api($user);
    }
}
