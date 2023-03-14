<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe_ingredient;
use Illuminate\Support\Collection;

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

            return view('home')->with('recipes', $recipeList)->with('categories', $categories)->with('ingredients', $ingredients);
        }

        return view('home')->with('recipes', $recipeList)->with('categories', $categories)->with('ingredients', $ingredients);
    }

    public function filter(Request $request)
    {
        $chosenCategory = $request->only(['category']);
        $removedIngredients = $request->only(['remove-ingredient']);

        $categories = Category::orderBy('name')->get();
        $ingredients = Ingredient::orderBy('name')->get();

        if (isset($_POST['remove-ingredient']) && isset($_POST['category'])) {

            $recipeIds = DB::table('recipe_ingredients')
                ->select('recipe_id')
                ->whereIn('recipe_ingredients.ingredient_id', $removedIngredients['remove-ingredient'])
                ->get();

            //putting property recipe_id into array to enable usage of "whereNotIn" function.
            foreach ($recipeIds as $recipeId) {
                $unwantedIds[] = $recipeId->recipe_id;
            }

            $filteredRecipes = DB::table('recipes')
                ->select('*')
                ->where('recipes.category_id', '=', $chosenCategory['category'])
                ->whereNotIn('recipes.id', $unwantedIds)
                ->get();

            return view('/home')->with('recipes', $filteredRecipes)->with('categories', $categories)->with('ingredients', $ingredients);
        }

        $filteredRecipes = DB::table('categories')
            ->select('*')
            ->orderBy('title')
            ->where('categories.id', '=', $chosenCategory['category'])
            ->join('recipes', 'recipes.category_id', '=', 'categories.id')
            ->get();

        return view('/home')->with('recipes', $filteredRecipes)->with('categories', $categories)->with('ingredients', $ingredients);
    }
}
