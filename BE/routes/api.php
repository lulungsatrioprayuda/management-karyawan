<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UnitController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('jabatan', JabatanController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

Route::get('/unit', [UnitController::class, 'index']);
Route::get('/unit/{id}', [UnitController::class, 'show']);
Route::post('/unit', [UnitController::class, 'store']);
Route::put('/unit/{id}', [UnitController::class, 'update']);
Route::delete('/unit/{id}', [UnitController::class, 'destroy']);
