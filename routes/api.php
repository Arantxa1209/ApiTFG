<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Demographics;
use App\Models\InitialEvaluatiton;
use App\Models\Orientation;
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
Route::get('users', [App\Http\Controllers\Api\UsersController::class, 'index']);

Route::get('users/{user}', [App\Http\Controllers\Api\UsersController::class, 'show']);

Route::post('users', [App\Http\Controllers\Api\UsersController::class, 'store']);

Route::put('users/{id}', [App\Http\Controllers\Api\UsersController::class, 'update']);

Route::delete('users/{id}', [App\Http\Controllers\Api\UsersController::class, 'delete']);

//AUTENTICACIÓN (logIn y logOut)
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('signup', [App\Http\Controllers\Api\AuthController::class,'signUp']);

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::get('user', [App\Http\Controllers\Api\AuthController::class,'user']);
    });
});

//Test inicial de evaluación
Route::post('addQuestions', [App\Http\Controllers\Api\InitialEvaluationController::class, 'addQuestions']);


//Demographics
Route::post('addAnswers', [App\Http\Controllers\Api\DemographicsController::class, 'addAnswers'])->middleware('auth:api');


//Orientation
Route::post('addAnswersOrientation', [App\Http\Controllers\Api\OrientationController::class, 'addAnswersOrientation']);
