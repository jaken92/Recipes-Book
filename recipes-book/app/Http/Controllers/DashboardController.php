<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        $ingredients = Ingredient::orderBy('name')->get();

        $recipeList = DB::table('recipes')
            ->select('*')
            ->orderBy('title')
            ->get();

        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            return view('dashboard')->with('recipes', $recipeList)->with('categories', $categories)->with('ingredients', $ingredients);
        }

        return view('dashboard')->with('recipes', $recipeList)->with('categories', $categories)->with('ingredients', $ingredients);
    }

    public function filter(Request $request, Recipe $category)
    {

        $ingredients = $request->only(['remove-ingredient']);

        $ingredients = DB::table('ingredients')
            ->select('*')
            ->orderBy('name')
            ->get();

        if (isset($_POST['category'])) {
            // $ingredients = $request->only(['remove-ingredient']);
            $chosenCategory = $request->only(['category']);

            $categories = DB::table('categories')
                ->select('*')
                ->orderBy('name')
                ->get();

            $filteredRecipes = DB::table('categories')
                ->select('*')
                ->orderBy('title')
                ->where('categories.id', '=', $chosenCategory['category'])
                ->join('recipes', 'recipes.category_id', '=', 'categories.id')
                ->get();

            return view('/dashboard')->with('recipes', $filteredRecipes)->with('categories', $categories)->with('ingredients', $ingredients);
        }

        if (isset($_POST['remove-ingredient'])) {
        }
    }
}
