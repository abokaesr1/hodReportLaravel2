<?php

namespace App\Helper;

use App\Models\Role as RoleModel;

class Role {
    public static function UserRole($user_role_id)
    {

        $role = RoleModel::where('id',$user_role_id)->where('status',1)->value('name');

        return $role;
    }
}
