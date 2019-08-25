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
    //--------------------User-----------------------
    Route::get('admin/user','AdminController@index');
    Route::post('admin/user/store','AdminController@userStore');
    Route::get('admin/user/data','AdminController@userData');
    Route::get('admin/selected/type/{selected_type}','AdminController@selectedData');
    Route::delete('admin/user/delete/{id}','AdminController@userDestroy');

    //-------------------Site Profile----------------
    Route::get('admin/site-profile','AdminController@siteProfile');
    Route::post('admin/change/site_profile','AdminController@changeSiteProfile');
    Route::post('admin/user/change/password','AdminController@changeUserPassword');
});