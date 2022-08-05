<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeCardController;
use App\Http\Controllers\IcController;

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

Route::get('/getAllUser', [UserController::class, 'index'])->name('userInfos.user');
Route::get('/getUserById/{id}', [UserController::class, 'show']);
Route::get('/getTimeCard/{id}', [TimeCardController::class, 'show']);
Route::get('/getIC', [IcController::class, 'index']);
Route::get('/getAllTC', [TimeCardController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
