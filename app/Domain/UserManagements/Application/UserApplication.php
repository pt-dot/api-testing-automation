<?php
namespace App\Domain\UserManagements\Application;

use App\Domain\UserManagements\Model\UserModel;
use App\Domain\UserManagements\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserApplication
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserModel $model)
    {
        $model->avatar = "https://ui-avatars.com/api/?name=" . urlencode($model->name);
        $model->password = Hash::make($model->password);
        return $this->userRepository->register($model);
    }
}
