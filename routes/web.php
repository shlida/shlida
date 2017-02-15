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

Route::get('/event', 'EventController@index');
Route::get('/event/{id}','EventController@show');

Route::get('/swatch', 'SwatchController@index');
Route::get('/swatch/{id}', 'SwatchController@show');

Route::get('/board', 'TopicController@index');
Route::get('/topic/{id}', 'TopicController@show');

// Route::get('/find/product/{keyword}/{limit}');
// Route::get('/find/issue/{keyword}/{limit}');

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/board/{type}', 'TopicController@listing');
    Route::get('/board/{type}/{date}', 'TopicController@listing');

    Route::get('/event/{type}','EventController@listing');
    Route::get('/event/{type}/{sort}','EventController@listing');

    Route::get('/issue/{keyword}','IssueController@listing');
});

Route::Auth();

//Route::get('/auth/{provider}', 'SocialAuthController@redirect');
//Route::get('/auth/{provider}/callback', 'SocialAuthController@callback');

// Route::group(['prefix' => 'api/v1'], function () {

//     Route::post('/auth', 'Auth\LoginController@apiAuth');

// });

// Route::group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () {

// 	Route::get('/testapi', function () {
// 		$result = [	'success' => true,
// 	            	'description' => 'authen success',
// 	            	'data' => [ 'session' => csrf_token(),
// 	                			    'id' => 1,
//                             'name' => 'aa@aa.co',
//                             'verified' => true,
//                           ]
//               ];

// 	    return response()->json($result, 200);
// 	});
// });

route::get('/redirect', 'Auth\LoginController@getRedirect');
route::get('/redirect/{url}', 'Auth\LoginController@setRedirect');
