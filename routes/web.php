<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

    //RolesPermissions
    Route::get('/roles/permissions/create/{role}', [RolePermissionController::class, 'create'])->name('role.permission.create');    

    //Users

});
