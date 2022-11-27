<?php

namespace app\models;

use app\core\DbModel;

class UserModel extends DbModel
{
    public $age;
    public  $user_id;
    public  $email;
    public  $password;
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