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
Route::get('/document', function () {
    return view('document');
});
// Route::get('/test', function () {
//     return view('test');
// });

//Test connect database
Route::get('/testDbConnection', function () {
    dd('Connected to the DB: ' . DB::connection()->getDatabaseName());
});
