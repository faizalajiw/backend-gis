<?php

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

Route::prefix('admin')->group(function () {
    //route login
    Route::post('/login', App\Http\Controllers\Api\Admin\LoginController::class, ['as' => 'admin']);

    //group route dengan middleware "auth:api"
    Route::group(['middleware' => 'auth:api'], function () {
        //route user logged in
        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name('user');

        //route logout
        Route::post('/logout', App\Http\Controllers\Api\Admin\LogoutController::class, ['as' => 'admin']);
    });
});
