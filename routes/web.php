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

//PHP_Laravel09_Task3
Route::get('xxx','AAAController\@bbb');

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    //PHP_Laravel09_Task4
    //PHP_Laravel12_Task2
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    //PHP_Laravel12_Task3
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    // Route::get('news/create', 'Admin/NewsController@add')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
