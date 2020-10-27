<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use App\Domain\UserManagements\Model\UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Domain\UserManagements\Application\UserApplication;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $model = new UserModel();
        $model->email = 'user@gmail.com';
        $model->password = 'rahasia123';
        $model->name = 'user';

        app()->make(UserApplication::class)->register($model);
        $this->assertDatabaseHas('users', [
            'email' => 'user@gmail.com'
        ]);
    }

    /**
     * a user test profile
     *
     * @return void
     */
    public function testUserProfile()
    {
        $controller = new UserController();
        $response = $controller->profile();

        $this->assertContains([
            "name" => "irfan",
            "email" => "irfan@gmail.com"
        ], $response);
    }
}
