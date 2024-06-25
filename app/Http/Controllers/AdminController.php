<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'roles' => Role::with('permissions')->where('name', '!=', 'super-admin')->get(),
            'permissions' => Permission::all(),
        ]);
    }
}
