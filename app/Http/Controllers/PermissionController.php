<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.index');
    }
}
