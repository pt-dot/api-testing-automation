<?php
namespace App\Domain\UserManagements\Model;

class UserModel
{
    public $name;
    public $email;
    public $password;
    public $avatar;
    public $created_by;
    public $updated_by;

    public function toArray(){
        return get_object_vars($this);
    }
}
