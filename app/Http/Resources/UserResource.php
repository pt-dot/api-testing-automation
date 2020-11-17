<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    public function toArray()
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "avatar" => $this->avatar
        ];
    }
}