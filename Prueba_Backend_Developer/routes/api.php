<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchesController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function(){
    //RUTAS PARA USUARIOS
    Route::prefix('users')->group(function (){
        Route::get('/all', [UsersController::class, 'index']);
        Route::get('/{id}', [UsersController::class, 'show']);
        Route::post('/add', [UsersController::class, 'store']);
        Route::post('/update/{id}', [UsersController::class, 'update']);
        Route::delete('/delete/{id}', [UsersController::class, 'destroy']);
    });

    //RUTAS PARA LOS PRODUCTOS
    Route::prefix('products')->group(function(){
        Route::get('all', [ProductsController::class, 'index']);
        Route::get('/{id}', [ProductsController::class, 'show']);
        Route::post('/add', [ProductsController::class, 'store']);
        Route::post('/update/{id}', [ProductsController::class, 'update']);
        Route::post('/results', [SearchesController::class, 'results']);
        Route::delete('/delete/{id}', [ProductSController::class, 'destroy']);
    });
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