<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::group([
        'middleware'=> 'api',
        'prefix'=>'auth',
    ],function($router){
            Route::post('login',[AuthController::class,'login']);
            Route::post('registeradmin', [AuthController::class,'registeradmin']);
            Route::post('register', [AuthController::class,'registerclient']);
            Route::post('logout', [AuthController::class,'logout']);
            Route::post('refresh', [AuthController::class,'refresh']);
            Route::get('profile', [AuthController::class,'profile']);
            Route::put('update', [AuthController::class,'update']);
            Route::delete('destroy', [AuthController::class,'destroy']);
    });




    Route::group([
        'middleware'=> 'api',
        'prefix'=>'Product',
    ],function($router){
            Route::get('index', [ProductController::class,'index']);
            Route::post('store', [ProductController::class, 'store']);
            Route::put('update', [ProductController::class,'update']);
            Route::delete('destroy',[ProductController::class,'destroy']);
        });
