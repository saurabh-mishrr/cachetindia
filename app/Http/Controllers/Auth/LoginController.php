<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use \Adldap\Laravel\Facades\Adldap;
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

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            // Returns \App\User model configured in `config/auth.php`.
            $user = Auth::user();
            $request->session()->put('name', $user->name);
            $request->session()->put('username', $user->username);
            return redirect()->to('home')
                ->withMessage('Logged in!');
        }

        return redirect()->to('login')
            ->withMessage('Hmm... Your username or password is incorrect');
    }
}
