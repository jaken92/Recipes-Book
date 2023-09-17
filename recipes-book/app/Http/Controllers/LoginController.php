<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return Redirect::to('/home');
        }

        return back()->withErrors('Woops! Please try to login again');
    }
}
