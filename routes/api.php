<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackingController;
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

Route::get('/user', function (Request $request) {

//    dd(auth()->user());
//    return 'hit';

//    $newToken = auth()->refresh();

//    auth('api')->invalidate();
    return auth('api')->user();
})
//;

    ->middleware('jwt.auth');



Route::post('/login', [LoginController::class, 'store']);
Route::post('/register', [RegisterController::class, 'store']);


Route::middleware(['jwt.auth'])->group(function () {

    Route::post('/tracking', [TrackingController::class, 'store']);
});

