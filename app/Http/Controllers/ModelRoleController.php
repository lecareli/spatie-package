<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ModelRoleController extends Controller
{
    public function create(User $user)
    {
        $roles = Role::where('name', '!=', 'super-admin')->get();
        $roles = $roles->filter(function($role) use ($user){
            return !$user->hasRole($role);
        });

        return view('model.role.create', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $role = Role::findById($request->role_id);

        $user->assignRole($role);

        return redirect()->route('admin.index');
    }

    public function destroy(User $user, Role $role)
    {
        $user->removeRole($role);
        return redirect()->route('admin.index');
    }
}
