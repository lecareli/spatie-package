<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'role:super-admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //Roles
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');

    //Permissions

    //RolesPermissions

    //Users

});
