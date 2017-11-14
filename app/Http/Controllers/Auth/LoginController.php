<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'verified' => 1];
    }


    public function login(Request $request)
    {

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request -> password,
            'verified' => 1
        ]))
        {
            $user= User::where('email', $request->email)->first();
            {

                switch ($user->role()) {
                    case "escritor":
                        return view('escritor');
                        break;
                    case "lector":
                        return view('lector');
                        break;

                }



            }
        }else{
            $errors = [$this->username() => trans('auth.failed')];


            $user =User::where($this->username(), $request->{$this->username()})->first();


            if ($user && \Hash::check($request->password, $user->password) && $user->confirmed != 1) {
                $errors = [$this->username() => trans('auth.verification')];
            }


            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }
    }



}
