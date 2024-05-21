<?php

use App\Http\Controllers\ApiServiceController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/tripslide', [ApiServiceController::class, 'tripSlide'] );
Route::get('/destinations', [ApiServiceController::class, 'destinationList'] );
Route::get('/destination/{id}', [ApiServiceController::class, 'destination'] );
Route::get('/trips', [ApiServiceController::class, 'trips'] );
Route::get('/trip/{id}', [ApiServiceController::class, 'trip'] );
Route::get('/tripdetail/{id}', [ApiServiceController::class, 'tripDetail'] );
Route::get('/search', [ApiServiceController::class, 'search'] );
Route::get('/recommended', [ApiServiceController::class, 'recomendDestination'] );
