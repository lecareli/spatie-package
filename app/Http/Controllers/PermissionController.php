<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.index');
    }
}
