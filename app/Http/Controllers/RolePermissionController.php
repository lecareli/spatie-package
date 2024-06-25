<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function create(Role $role)
    {
        $permissions = Permission::all();

        $permissions = $permissions->filter(function ($permission) use ($role) {
        return !$role->hasPermissionTo($permission);
        });

        return view('role.permission.create', [
        'role' => $role,
        'permissions' => $permissions
        ]);
    }
}
