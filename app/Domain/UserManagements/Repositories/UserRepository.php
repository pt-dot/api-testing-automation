<?php
namespace App\Domain\UserManagements\Repositories;

use App\Domain\UserManagements\Model\UserModel;
use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register(UserModel $model)
    {
        $this->model->name = $model->name;
        $this->model->email = $model->email;
        $this->model->password = $model->password;
        $this->model->avatar = $model->avatar;
        $this->model->save();

        return $this->model->only(['id', 'name', 'email', 'created_at']);
    }
}
