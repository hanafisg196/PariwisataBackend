<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UploadImageTmpController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'] );

Route::middleware(AdminMiddleware::class)->group(function (){
    Route::post('/logout', [LoginController::class, 'doLogout'] );
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('trip', [TripController::class, 'index']);
    Route::get('destination', [DestinationController::class, 'index']);
    Route::post('trip/add', [TripController::class, 'add']);
    Route::post('trip/update/{id}', [TripController::class, 'update']);
    Route::get('destination/addform', [DestinationController::class, 'addView']);
    Route::post('destination/create', [DestinationController::class, 'create']);
    Route::post('destination/delete/{id}', [DestinationController::class, 'delete']);
    Route::post('/upload', [UploadImageTmpController::class, 'store']);
});

