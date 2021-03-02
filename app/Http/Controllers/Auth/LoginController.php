<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Student;
use App\User;
use App\UserSocialAccount;

use Illuminate\Http\Request;


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
    public function redirectToprovider(string $driver){
        return Socialite::driver($driver)->redirect();
    }
    
    public function handleProviderCallback (string $driver) {
    	if( ! request()->has('code') || request()->has('denied')) {
    		session()->flash('message', ['danger', __("Inicio de sesión cancelado")]);
    		return redirect('login');
	    }
        $socialUser = Socialite::driver($driver)->user();
        dd($socialUser);
    }
    }

