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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test','FrontApi@testing');
Route::post('contact_form','FrontApi@save_contact_query');
Route::post('subscribe','FrontApi@subscribe_user');
Route::get('get_feedback_type','FrontApi@get_feedback_type');
Route::post('save_feedback','FrontApi@save_feedback');
Route::post('signup','Authcontroller@signup');
Route::post('login','Authcontroller@login');


