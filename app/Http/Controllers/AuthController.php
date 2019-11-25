<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    public function login()
    {
        return view('login.index');
    }
    public function postlogin(Request $request)
    {
        $request->merge(['status' => 'active']);
        if (Auth::attempt($request->only('username', 'password', 'status'))) {
            return redirect('/dashboard')->with('sukses', 'Login in...');
        }
        return redirect('/restricted')->with('gagal', 'Auth authorization failed or check your username and password!');
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', 'status');
    }
    protected function attemptLogin(Request $request)
    {
        $request->merge(['status' => 'active']);
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
        return redirect('/dashboard')->with('sukses', 'Login in...');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/restricted');
    }
}
