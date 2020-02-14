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

/**
 * @endpoint /v1/image
 */
Route::group(['prefix' => 'image'], function () {

    // v1/image/upload
    Route::get('/upload', 'Image\\ImageController@transform');

});
