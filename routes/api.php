<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('profile', 'profile');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('index', 'index');
    Route::get('show/{$id}', 'show');
    Route::post('store', 'store');
    Route::get('edit', 'edit');
    Route::put('update', 'update');
    Route::delete('destroy', 'destroy');
});

//Route::resource('product', 'ProductController');
