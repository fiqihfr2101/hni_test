<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    //protected $redirectTo = '/master';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
          ]) && Auth::user()->hasRole('superadmin')){
            return $this->redirectTo = 'master';
          }elseif(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
          ]) && Auth::user()->hasRole('admin')){
            return $this->redirectTo = 'admin';
          }
        
        $this->middleware('guest')->except('logout');
    }
}
