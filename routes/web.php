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

Route::Auth();

//Route::get('/auth/{provider}', 'SocialAuthController@redirect');
//Route::get('/auth/{provider}/callback', 'SocialAuthController@callback');

Route::group(['prefix' => 'api/v1'], function () {

    Route::post('/auth', 'Auth\LoginController@apiAuth');

});

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () {

	Route::get('/testapi', function () {
		$result = [	'success' => true,
	            	'description' => 'authen success',
	            	'data' => [ 'session' => csrf_token(),
	                			    'id' => 1,
                            'name' => 'aa@aa.co',
                            'verified' => true,
                          ]
              ];

	    return response()->json($result, 200);
	});
});

route::get('/redirect', 'Auth\LoginController@getRedirect');
route::get('/redirect/{url}', 'Auth\LoginController@setRedirect');
