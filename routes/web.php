<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelPermissionController;
use App\Http\Controllers\ModelRoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'role:super-admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //Roles
    Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('role.delete');

    //Permissions
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permission.store');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');

    //RolesPermissions
    Route::get('/roles/permissions/create/{role}', [RolePermissionController::class, 'create'])->name('role.permission.create');
    Route::post('/roles/permissions', [RolePermissionController::class, 'store'])->name('role.permission.store');
    Route::delete('/roles/permissions/{role}/{permission}', [RolePermissionController::class, 'destroy'])->name('role.permission.delete');

    //Users
    Route::get('/model/roles/create/{user}', [ModelRoleController::class, 'create'])->name('model.role.create');
    Route::post('/model/roles', [ModelRoleController::class, 'store'])->name('model.role.store');
    Route::delete('/model/roles/{user}/{role}', [ModelRoleController::class, 'destroy'])->name('model.role.delete');

    Route::get('/model/permissions/create/{user}', [ModelPermissionController::class, 'create'])->name('model.permission.create');
    Route::post('/model/permissions', [ModelPermissionController::class, 'store'])->name('model.permission.store');
    Route::delete('/model/permissions/{user}/{permission}', [ModelPermissionController::class, 'destroy'])->name('model.permission.delete');
});
