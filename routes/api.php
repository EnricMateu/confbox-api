<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;

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

Route::middleware('auth:api')->get(/**
 * @param Request $request
 * @return mixed
 */ '/user', function (Request $request) {
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



//* COMPANY PROFILE API ROUTES
Route::get('/companies', 'CompanyController@index');
Route::get('/companies/{companies}', 'CompanyController@show');
Route::post('/companies', 'CompanyController@store');
Route::put('/companies/{companies}', 'CompanyController@update');
Route::delete('/companies/{companies}', 'CompanyController@delete');
//* END OF COMPANY ROUTES

//* USER PROFILE API ROUTES
Route::get('userprofiles', 'UserProfileController@index');
Route::get('userprofiles/{userprofile}', 'UserProfileController@show');
Route::post('userprofiles', 'UserProfileController@store');
Route::put('userprofiles/{userprofile}', 'UserProfileController@update');
Route::delete('userprofiles/{userprofile}', 'UserProfileController@delete');
//* END OF USER PROFILE  ROUTES


/*
* Returns Json Message if Api Route does not exist or is wrong
* @return \Illuminate\Http\Response
*/
Route::fallback(function(){
return response()->json([
    'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
