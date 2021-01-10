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

//Autenticador
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
//Registrar usuario
Route::post('/add', [UsersController::class, 'store']);
//Ya cuando está registrado
Route::group([
    'middleware' => 'api',
], function(){
    Route::prefix('/v1')->group(function(){
        //RUTAS PARA USUARIOS
        Route::prefix('users')->group(function (){
            Route::get('/all', [UsersController::class, 'index']);
            Route::get('/{id}', [UsersController::class, 'show']);
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
});


