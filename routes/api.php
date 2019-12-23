<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('artists', 'ArtistsController@index');
// Route::get('artists/{artist}', 'ArtistsController@show');
// Route::post('artists', 'ArtistsController@store');
// Route::put('artists/{artist}', 'ArtistsController@update');
// Route::delete('artists/{artist}', 'ArtistsController@delete');
Route::get('/shows', 'HomeController@showAPI');
Route::get('/artists', 'HomeController@artistAPI');
Route::get('/showlisting', 'HomeController@allshowsAPI');
