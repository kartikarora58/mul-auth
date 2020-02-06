<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class VendorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('vendor-auth.vendor-login');
    }
    protected function guard()
    {
        return Auth::guard('vendor');
    }
    use AuthenticatesUsers;
    // where to redirect users after login
    protected $redirectTo='/vendor/home';

    public function __construct()
    {
        $this->middleware('guest:vendor')->except('logout');
    }
    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //     // the login attempts for this application. We'll key this by the username and
    //     // the IP address of the client making these requests into this application.
    //     if (method_exists($this, 'hasTooManyLoginAttempts') &&
    //         $this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);

    //         return $this->sendLockoutResponse($request);
    //     }

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }

    //     // If the login attempt was unsuccessful we will increment the number of attempts
    //     // to login and redirect the user back to the login form. Of course, when this
    //     // user surpasses their maximum number of attempts they will get locked out.
    //     $this->incrementLoginAttempts($request);

    //     return $this->sendFailedLoginResponse($request);
    // }

    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();



        // return $this->loggedOut($request) ?: redirect('/');
        return redirect('/vendor/login');
    }
}
