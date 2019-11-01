<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    // '/application'=> 'ApplicationController',
    '/event'=> 'EventController',
]);

// EVENTS ROUTES
Route::get('validateEvent/{event}','EventController@validateEvent');
Route::get('validatedEvents','EventController@showValidatedEvents');

// APPLICATION ROUTES
Route::get('event/{event}/apply', 'ApplicationController@store');
Route::put('/application/{application}/update-status', 'ApplicationController@changeApplicationStatus');
