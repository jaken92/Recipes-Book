<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $ingredients = DB::select('select * from ingredients');
            return view('addRecipe')->with('ingredients', $ingredients);
        }
    }
}
//return view('addRecipe', ['user' => $user], 'ingredients', compact($ingredients));