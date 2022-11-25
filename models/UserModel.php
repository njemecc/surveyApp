<?php

namespace app\models;

use app\core\DbModel;

class UserModel extends DbModel
{
    public $age;
    public string $user_id;
    public string $email;
    public string $password;
    public $role_names;

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "user_id",
            "email",
            "password",
            "age"
        ];
    }
}