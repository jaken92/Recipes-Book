<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            // redirect to dashboard
            $request->session()->regenerate();

            return redirect()->intended("dashboard");
        }
        // redirect to index
        return back()->withErrors("Woops! Please try login again");
        // Woops! Please try login again
    }
}
