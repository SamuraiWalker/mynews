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
//Route::get('xxx','AAAController\@bbb');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    //PHP_Laravel09_Task4
    //PHP_Laravel12_Task2
    //PHP_Laravel13_Task3
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    //PHP_Laravel12_Task3
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    //PHP_Laravel13_task6
    Route::post('profile/edit', 'Admin\ProfileController@update');
    // Route::get('news/create', 'Admin/NewsController@add')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index');
    // Laravel16 追記↓
    route::get('news/edit', 'Admin\NewsController@edit');
    route::post('news/edit', 'Admin\NewsController@update');
    route::get('news/delete', 'Admin\NewsController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
