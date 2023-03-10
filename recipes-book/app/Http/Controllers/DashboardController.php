<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = DB::table('categories')->get();
        $ingredients = DB::table('ingredients')->select('*')->get();
        $recipes = DB::table('recipes')->get();
        $recipeIngredients = DB::table('recipe_ingredients')->get();
        $users = DB::table('users')->select('id', 'name')->get();

        $recipes = DB::table('recipe_ingredients')->select('*')
            ->join('recipes', 'recipes.id', '=', 'recipe_ingredients.recipe_id')
            ->join('ingredients', 'ingredients.id', '=', 'recipe_ingredients.ingredient_id')
            ->get();

        $recipeList = DB::table('recipes')->select('*')
            ->get();
        //getting recipes and category id
        $recipeCategory = DB::table('categories')->select('*')
            ->join('recipes', 'recipes.category_id', '=', 'categories.id')
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
        $ingredients = DB::table('ingredients')->select('*')->get();

        if (isset($_POST['category'])) {
            // $ingredients = $request->only(['remove-ingredient']);
            $chosenCategory = $request->only(['category']);

            $categories = DB::table('categories')->get();

            $filteredRecipes = DB::table('categories')
                ->select('*')
                ->where('categories.id', '=', $chosenCategory['category'])
                ->join('recipes', 'recipes.category_id', '=', 'categories.id')
                ->get();

            return view('/dashboard')->with('recipes', $filteredRecipes)->with('categories', $categories)->with('ingredients', $ingredients);
        }
    }
}
