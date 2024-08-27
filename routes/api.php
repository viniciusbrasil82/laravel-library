<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::controller(Controllers\AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::middleware('auth:api') ->group(function () {
    /*Route::get('/user', function (Request $request) {
        return $request->user();
    });*/
    /*Route::controller(AuthorController::class)->group(function () {
        Route::get('/authors/{id}', 'show');
        Route::post('/authors', 'store');
    });*/
//    Route::apiResource('Authors', AuthorController::class);    
    Route::apiResource('author', Controllers\Library\AuthorController::class);    
    //Route::apiResource('book', BookController::class);    
    //Route::apiResource('borrow', BorrowController::class);    

});
//Route::apiResource('author', Controllers\Library\AuthorController::class);  

;