<?php

use App\Http\Controllers\TokensController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/testing-api', function(){
    return ['message' => 'Hello'];
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function(){
    Route::get('/showUsers', [UsersController::class, 'index']);
    Route::post('/saveUser', [UsersController::class, 'store']);
    Route::get('/user/{id}', [UserController::class, 'show']);
});
//Autenticación
/* Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1'], function(){
    Route::post('/auth/login', [TokensController::class, '']);
    Route::get('/auth/login', [TokensController::class, '']);
});
Route::group(['middleware' => [], 'prefix' => 'v1'], function(){
    Route::post('/auth/login', [TokensController::class, 'login']);
    Route::get('hola', [TokensController::class, 'prueba']);
}); */