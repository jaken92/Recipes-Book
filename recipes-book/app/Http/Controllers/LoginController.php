<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    //     public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return $this->loggedOut($request) ?: redirect('/login');
    // }

    public function __invoke(Request $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended("dashboard");
        }

        return back()->withErrors("Woops! Please try login again");
    }
}
