<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::group([
        'middleware'=> 'api',
        'prefix'=>'auth',
    ],function($router){
            Route::post('login',                [AuthController::class,'login']);
            Route::post('registeradmin',        [AuthController::class,'registeradmin']);
            Route::post('register',             [AuthController::class,'registerclient']);
            Route::post('logout',               [AuthController::class,'logout']);
            Route::post('refresh',              [AuthController::class,'refresh']);
            Route::get('profile',               [AuthController::class,'profile']);
            Route::put('update/{id}',           [AuthController::class,'update']);
            Route::delete('destroy/{id}',       [AuthController::class,'destroy']);
    });

    Route::group([
        'middleware'=> 'api',
        'prefix'=>'product',
    ],function($router){
            Route::get('index',                 [ProductController::class,'index']);
            Route::post('store',                [ProductController::class, 'store']);
            Route::put('update/{id}',           [ProductController::class,'update']);
            Route::delete('destroy/{id}',       [ProductController::class,'destroy']);
        });

    Route::group([
        'middleware'=> 'api',
        'prefix'=>'role',
    ],function($router){
            Route::get('index',                 [RoleController::class,'index']);
            Route::post('store',                [RoleController::class, 'store']);
            Route::put('update/{id}',           [RoleController::class,'update']);
            Route::delete('destroy/{id}',       [RoleController::class,'destroy']);
        });

     Route::group([
        'middleware'=> 'api',
        'prefix'=>'permission',
    ],function($router){
            Route::get('index',                 [PermissionController::class,'index']);
            Route::get('Show',                  [PermissionController::class,'Show']);
            Route::post('ProductAll',           [PermissionController::class,'ProductAll']);
            Route::post('RoleAll',              [PermissionController::class,'RoleAll']);
            Route::post('UserAllClient',        [PermissionController::class,'UserAll']);
            Route::post('UserAllEmpleado',      [PermissionController::class,'UserAll']);
            Route::post('UserAllAdmin',         [PermissionController::class,'UserAll']);
            Route::post('UsersCreateadmin',     [PermissionController::class,'UsersCreateadmin']);
            Route::post('UsersCreateempleado',  [PermissionController::class,'UsersCreateempleado']);
            Route::post('UsersCreateclient',    [PermissionController::class,'UsersCreateclient']);
            Route::post('UsersEditadmin',       [PermissionController::class,'UsersEditadmin']);
            Route::post('UsersEditempleado',    [PermissionController::class,'UsersEditempleado']);
            Route::post('UsersEditclient',      [PermissionController::class,'UsersEditclient']);
            Route::post('UsersReadadmin',       [PermissionController::class,'UsersReadadmin']);
            Route::post('UsersReadempleado',    [PermissionController::class,'UsersReadempleado']);
            Route::post('UsersReadclient',      [PermissionController::class,'UsersReadclient']);
            Route::post('UsersDeleteadmin',     [PermissionController::class,'UsersDeleteadmin']);
            Route::post('UsersDeleteempleado',  [PermissionController::class,'UsersDeleteempleado']);
            Route::post('UsersDeleteclient',    [PermissionController::class,'UsersDeleteclient']);
            Route::post('ProductCreate',        [PermissionController::class,'ProductCreate']);
            Route::post('ProductEdit',          [PermissionController::class,'ProductEdit']);
            Route::post('ProductRead',          [PermissionController::class,'ProductRead']);
            Route::post('ProductDelete',        [PermissionController::class,'ProductDelete']);
            Route::post('RoleCreate',           [PermissionController::class,'RoleCreate']);
            Route::post('RoleEdit',             [PermissionController::class,'RoleEdit']);
            Route::post('RoleRead',             [PermissionController::class,'RoleRead']);
            Route::post('RoleDelete',           [PermissionController::class,'RoleDelete']);

        });

