<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
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

//Auth routs
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group([
    
    'middleware' => 'api'
    
], function(){
    Route::prefix('/v1')->group(function(){
        //Routes for users
        Route::prefix('users')->group(function (){
            Route::post('/add', [UsersController::class, 'store']);//Register a new user
            Route::get('/all', [UsersController::class, 'index']);//Ahow all the users.
            Route::get('/{id}', [UsersController::class, 'show']);//Show just one user.
            Route::post('/update/{id}', [UsersController::class, 'update']);//Update one user.
            Route::delete('/delete/{id}', [UsersController::class, 'destroy']);//Delete one user.
        });
        
        //Routes for products
        Route::prefix('products')->group(function(){
            Route::get('all', [ProductsController::class, 'index']);//Show all the products.
            Route::get('/{id}', [ProductsController::class, 'show']);//Show one product.
            Route::post('/add', [ProductsController::class, 'store']);//Add one product
            Route::post('/update/{id}', [ProductsController::class, 'update']);//Update one product
            Route::post('/results', [SearchesController::class, 'results']);//get the results of the search.
            Route::delete('/delete/{id}', [ProductSController::class, 'destroy']);//Delete one product
        });
    });
});


