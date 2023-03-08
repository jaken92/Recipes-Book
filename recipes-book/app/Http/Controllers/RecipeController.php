<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    }

    public function show(Recipe $recipe)
    {

        $singleRecipe = DB::table('recipes')->select('recipes.title', 'categories.name as category_name', 'recipes.instructions', 'users.name as user_name')
            ->join('users', 'recipes.user_id', '=', 'users.id')
            ->join('categories', 'recipes.category_id', '=', 'categories.id')
            ->where('recipes.id', '=', $recipe['id'])
            ->get();

        $recipeIngredients
            = DB::table('recipe_ingredients')->select('ingredients.name')
            ->join('ingredients', 'recipe_ingredients.ingredient_id', '=', 'ingredients.id')
            ->where('recipe_ingredients.recipe_id', '=', $recipe['id'])
            ->get();

        return view('recipe')->with('recipe', $singleRecipe)->with('allIngredients', $recipeIngredients);
    }
}
