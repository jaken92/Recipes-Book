<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $ingredients = DB::table('ingredients')->get();
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




        /* echo $recipe->id;
                echo $recipe->title;
                echo $recipe->instructions;
                echo $recipe->category_id;
                echo $recipe->ingredient_id;
                echo $recipe->name;
                echo $recipe->amount;
                echo $recipe->unit; */

        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            return view('dashboard')->with('recipes', $recipeList)->with('categories', $categories);
        }

        return view('dashboard')->with('recipes', $recipeList)->with('categories', $categories);
    }

    public function filter(Request $request)
    {

        if (isset($_POST['category'])) {
            $chosenCategory = $request->only(['category']);

            $categories = DB::table('categories')->get();

            $filteredRecipes = DB::table('categories')
                ->select('*')
                ->where('categories.id', '=', $chosenCategory['category'])
                ->join('recipes', 'recipes.category_id', '=', 'categories.id')
                ->get();

            return view('dashboard')->with('recipes', $filteredRecipes)->with('categories', $categories);
        }
    }
}
