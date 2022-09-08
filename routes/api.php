<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeCardController;
use App\Http\Controllers\IcController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GroupController;
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

//create / store data
Route::post('/insertCompany', [CompanyController::class, 'store']);
Route::post('/insertEmployee', [EmployeeController::class, 'store']);
Route::post('/insertGroup', [GroupController::class, 'store']);
Route::post('/insertIc', [IcController::class, 'store']);
Route::post('/insertTimeCard', [TimeCardController::class, 'store']);

//retrieve all
Route::get('/getAllUser', [UserController::class, 'index'])->name('userInfos.user');
Route::get('/getAllTc', [TimeCardController::Class, 'index']);
Route::get('/getIC', [IcController::class, 'index']);
Route::get('/getAllCompany', [CompanyController::class, 'index']);
Route::get('/getAllGroups', [GroupController::class, 'index']);
Route::get('/getAllEmployee', [EmployeeController::class, 'index']);

//retrieve with id
Route::get('/getUserById/{id}', [UserController::class, 'show']);
Route::get('/getTimeCard/{id}', [TimeCardController::class, 'show']);
Route::get('/getIcByEmp/{id}', [IcController::class, 'show']);
ROute::post('/getTcByEmp/{id}', [TimeCardController::class, 'tcById']);

//update
Route::post('/updateIc/{id}', [IcController::class, 'update']);
Route::post('/updateCompany/{id}', [CompanyController::class, 'update']);
Route::post('/updateUser/{id}', [UserController::class, 'update']);
Route::post('/updateGroup/{id}', [GroupController::class, 'update']);
Route::post('/updateTimeCard/{id}', [TimeCardController::class, 'update']);
Route::post('/updateEmployee/{id}', [EmployeeController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
