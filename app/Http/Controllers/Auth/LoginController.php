<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/document';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function apiAuth(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return response()->json(null, 404);
        }

        if (!filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)){
          $result = [ 'username'=>$request->input('username'),
                      'password'=>md5($request->input('password')),
                      'banned'=>0,
                    ];
        } else {
          $result = [ 'email'=>$request->input('username'),
                      'password'=>md5($request->input('password')),
                      'banned'=>0,
                    ];
        }

        if (Auth::attempt($result, $request->has('remember'))) {
            // Authentication passed...
            return response()->json(['data' => Auth::user() ]);
        }

        $this->incrementLoginAttempts($request);
        return response()->json(null, 404);
    }

    public function setRedirect($url)
    {
        $this->redirectTo = strtolower($url);
    }

    public function getRedirect()
    {
        return $this->redirectTo;
    }
}
