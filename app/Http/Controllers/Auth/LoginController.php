<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\PostLoginRequest;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(PostLoginRequest $request)
    {
        $input = $request->all();

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (!empty( auth()->user()->phone_verified_at)) {
                return redirect()->route( 'dashboard');
            } else {
                return redirect()->route( 'otp')
                    ->with('error', 'Your mobile no is not verify.');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email -Address And Password Are Wrong.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
