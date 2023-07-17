<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /************************************************************************
    *Login Form
    *************************************************************************/
    public function loginForm()
    {
        //If user is already logged in then redirect to dashboard
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        }
        
        return view('auth.login');
    }

    /************************************************************************
    *Login function
    *************************************************************************/
    public function login(Request $request)
    {
        //login credentials
        $credentials = $request->only('email', 'password');

        //authentication logic
        if (Auth::attempt($credentials)) {
            //if success
            return redirect()->intended('/admin/dashboard');
        } else {
            //if failed
            return redirect()->back()->withInput()->withErrors(['login' => 'Invalid credentials']);
        }
    }

    /************************************************************************
    *Logout function
    *************************************************************************/
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
