<?php

namespace Tests\Unit;

use App\Domain\UserManagements\Application\UserApplication;
use App\Domain\UserManagements\Model\UserModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
