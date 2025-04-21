<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

/* Route::get('events', [EventController::class, "index"]);
Route::post ('events', [EventController::class, "store"]);
Route::get ("events/{event}", [EventController::class,"show"]);
Route::put ("events/{event}", [EventController::class,"update"]);
Route::delete ("events/{event}", [EventController::class,"destroy"]);
 */
/* Route::apiResource("events", EventController::class);
Route::apiResource("venues", VenueController::class); */

Route::post('/login', [LoginController::class, 'login']);

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource("events", EventController::class);
    Route::apiResource("venues", VenueController::class);
});
