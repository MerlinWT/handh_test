<?php
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

// Method implementation for test task
// to test:
//      curl --header "Content-Type: application/json" --request POST --data '{"login": "admin", "password": "root"}' http://kovalenko.test:8081/api/auth
Route::post('/auth', 'SessionController@generateToken');
