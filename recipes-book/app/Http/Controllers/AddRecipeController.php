<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddRecipeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();
            // print_r($user);            
            return view('addRecipe', ['user' => $user]);
        }
    }
}
