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
Route::get('/document', function () {
    return view('document');
});

Route::get('/board', 'TopicController@index');
Route::get('/topic/{id}', 'TopicController@show');

Route::group(['prefix' => 'event'], function () {
    Route::get('/', 'EventController@index');
    Route::get('/{id}','EventController@show');
});

Route::group(['prefix' => 'swatch'], function () {
    Route::get('/', 'SwatchController@index');
    Route::get('/{id}', 'SwatchController@show');
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

    Route::get('/issue/{keyword}','IssueController@listing');
});

Route::Auth();

route::get('/redirect', 'Auth\LoginController@getRedirect');
route::get('/redirect/{url}', 'Auth\LoginController@setRedirect');
