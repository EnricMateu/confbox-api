<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::resources([
    '/event'=> 'EventController',
]);

//* EVENTS ROUTES
Route::patch('validateEvent/{event}','EventController@validateEvent');
Route::get('validatedEvents','EventController@showValidatedEvents');

// THIERRY EVENT ROUTE
Route::post('/event/{company_id}/create', 'EventController@store_api');
Route::get('/events', 'EventController@index');


// APPLICATION ROUTES
Route::post('event/{event}/apply', 'ApplicationController@store');
Route::put('/application/{application}/update-status', 'ApplicationController@changeApplicationStatus');



// COMPANY PROFILE API ROUTES
Route::get('/company', 'CompanyController@index');
Route::get('/company/{company_id}', 'CompanyController@show');
Route::post('/company/create', 'CompanyController@store');
Route::put('/company/{company}', 'CompanyController@update');
Route::delete('/company/{company}/delete', 'CompanyController@delete');
// END OF COMPANY ROUTES

// USER PROFILE API ROUTES
Route::get('userprofile', 'UserProfileController@index');
Route::get('userprofile/{userprofile}', 'UserProfileController@show');
Route::post('userprofile', 'UserProfileController@store');
Route::put('userprofile/{userprofile}', 'UserProfileController@update');
Route::delete('userprofile/{userprofile}', 'UserProfileController@delete');
// END OF USER PROFILE  ROUTES


/*
* Returns Json Message if Api Route does not exist or is wrong
* @return \Illuminate\Http\Response
*/
// Route::fallback(function () {
//     return response()->json([
//         'message' => 'Page Not Found. If error persists, contact info@website.com'
//     ], 404);
// });
