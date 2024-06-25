<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create(Role $role)
    {
        $permissions = Permission::all();
        $permissions = $permissions->filter(function($permission) use ($role){
            return !$role->hasPermissionTo($permission);
        });

        return view('role.create', [
            'permissions' => $permissions,
            'role' => $role,
        ]);
    }

    public function store(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);

        $role->givePermissionTo($permission);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.index');
    }
}
