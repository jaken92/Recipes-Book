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

            $categories = DB::table('categories')->get();

            $ingredients = DB::table('ingredients')->get();

            return view('addRecipe')->with('ingredients', $ingredients)->with('categories', $categories);
        }
        return redirect('/');
    }
}
