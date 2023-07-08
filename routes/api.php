<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\AdminController;
use App\Http\Controllers\API\Organiser\OrganiserController as OrganiserLogin;
use App\Http\Controllers\API\Admin\OrganiserController;
use App\Http\Controllers\API\Admin\EventController;
use App\Http\Controllers\API\Organiser\EventController as OrganiserEvent;
use Illuminate\Support\Facades\Auth;

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

// Admin login route
Route::post('/admin/login', [AdminController::class, 'AdminLogin']);

// Organiser login route
Route::post('/organiser/login', [OrganiserLogin::class, 'OrganiserLogin']);

// Admin's route
Route::prefix('admin')->name('admin.')->middleware('auth:adminapi')->group(function () {
    Route::apiResource('/organisercreate', OrganiserController::class);
    Route::apiResource('/apievent', EventController::class);
});

// Organiser's route
Route::prefix('organiser')->name('organiser.')->middleware('auth:organiserapi')->group(function () {
    Route::apiResource('/apievent', OrganiserEvent::class);
});
