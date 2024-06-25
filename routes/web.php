<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'role:super-admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
