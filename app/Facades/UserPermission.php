<?php

namespace App\Facades;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class UserPermission
{

    public static function loadPermissions($user_type)
    {   
        
    
        $sess = Array();
        $perm = Permission::with('resource')->where('role_id', Auth::user()->role_id)->get();

        foreach ($perm as $item) {

            $sess[$item->resource->nome] = (bool) $item->permissao;
        }

        session(['user_permissions' => $sess]);

    }

    public static function isAuthorized($rule)
    {
        $permissions = session('user_permissions');
        return $permissions[$rule];
    }

}