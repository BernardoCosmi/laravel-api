<?php

use App\Http\Controllers\Api\ProjectControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [ProjectControllerApi::class, 'index']);

Route::get('/test/{slug}', [ProjectControllerApi::class, 'show']);

Route::post('/contacts', [LeadController::class, 'store']);