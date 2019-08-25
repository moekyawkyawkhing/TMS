<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin-login','Auth\LoginController@loginForm');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'admin'],function(){
    Route::get('logout','Auth\LoginController@logout');
    Route::get('admin','AdminController@index');
});