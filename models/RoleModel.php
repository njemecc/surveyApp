<?php

namespace app\models;

use app\core\DbModel;

class RoleModel extends DbModel
{
     public $role_name;
     public $role_id;
     public $is_active;

    public function tableName()
    {
        return "roles";
    }

    public function attributes(): array
    {
        return [
            "role_id",
            "role_name",
            "is_active",
        ];
    }
}