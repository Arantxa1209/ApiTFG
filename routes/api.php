<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//CRUD para usuarios
Route::get('users', [App\Http\Controllers\UsersController::class, 'index']);

Route::get('users/{user}', [App\Http\Controllers\UsersController::class, 'show']);

Route::post('users', [App\Http\Controllers\UsersController::class, 'store']);

Route::put('users/{id}', [App\Http\Controllers\UsersController::class, 'update']);

Route::delete('users/{id}', [App\Http\Controllers\UsersController::class, 'delete']);