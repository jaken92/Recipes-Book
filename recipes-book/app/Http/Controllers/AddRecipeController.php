<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
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
            Auth::user();
            $request->user();

            $categories = Category::orderBy('name')->get();
            $ingredients = Ingredient::orderBy('name')->get();

            return view('addRecipe')->with('ingredients', $ingredients)->with('categories', $categories);
        }

        return redirect('/');
    }
}
