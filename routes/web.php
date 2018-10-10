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

Route::get('/', function () {
	$links = array(
		'https://www.google.com.pe'=>'Google',
		'https://www.xvideos.com' =>'XVIDEOS'

	);
    return view('welcome',['links'=>$links]);
});

Route::get('/acerca',function(){
	return view('about');
});