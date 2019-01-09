<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'PageController@home');
Route::get('/messages/{message}', 'MessagesController@show');
Route::post('/messages/create', 'MessagesController@create')->middleware('auth');
Route::get('/{username}', 'UsersController@show');
Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');
Route::post('/{username}/follow', 'UsersController@follow');
Route::post('/{username}/unfollow', 'UsersController@unfollow');


Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
//Route::get('/home', 'HomeController@index')->name('home');
