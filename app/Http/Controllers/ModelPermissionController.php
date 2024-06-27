<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ModelPermissionController extends Controller
{
    public function create(User $user)
    {
        $permissions = Permission::all();
        $permissions = $permissions->filter(function($permission) use ($user){
            return !$user->hasPermissionTo($permission);
        });

        return view('model.permission.create', [
            'user' => $user,
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $permission = Permission::findById($request->permission_id);

        $user->givePermissionTo($permission);

        return redirect()->route('admin.index');
    }

    public function destroy(User $user, Permission $permission)
    {
        $user->revokePermissionTo($permission);
        return redirect()->route('admin.index');
    }
}
