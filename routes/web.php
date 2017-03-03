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
    return view('welcome');
});
Route::get('/home', function () {
    return view('document');
});
// Route::get('/document', function () {
//     return view('document');
// });
Route::group(['prefix' => 'board'], function () {
    Route::get('/', 'TopicController@index');
    Route::get('/{type}', 'TopicController@index');
    Route::get('/{type}/{date}', 'TopicController@index');
});

Route::group(['prefix' => 'event'], function () {
    Route::get('/', 'EventController@index');
    Route::get('/{type}', 'EventController@index');
    Route::get('/{type}/{sort}', 'EventController@index');
});

Route::group(['prefix' => 'swatch'], function () {
    Route::get('/', 'SwatchController@index');
});

Route::group(['prefix' => 'find'], function () {
    Route::get('/product/{keyword}/{limit}', 'FindController@product');
    Route::get('/issue/{keyword}/{limit}', 'FindController@issue');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/board/{type}', 'TopicController@listing');
    Route::get('/board/{type}/{date}', 'TopicController@listing');

    Route::get('/event/{type}','EventController@listing');
    Route::get('/event/{type}/{sort}','EventController@listing');
    Route::get('/event/count','EventController@count');

    Route::get('/issue/{keyword}','IssueController@listing');
});

Route::Auth();

route::get('/redirect', 'Auth\LoginController@getRedirect');
route::get('/redirect/{url}', 'Auth\LoginController@setRedirect');
