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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('redboxes',\App\Http\Controllers\Api\RedBoxController::class);
Route::apiResource('polices',\App\Http\Controllers\Api\PoliceController::class);
Route::apiResource('assignments',\App\Http\Controllers\Api\AssignmentController::class);
Route::apiResource('reports',\App\Http\Controllers\Api\ReportController::class);
