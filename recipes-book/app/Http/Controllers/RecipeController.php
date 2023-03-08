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

        /* $singleRecipe = DB::table('recipes')->select('*')
                ->where('id', '=', $recipe->recipe_id)
                ->get();

            return view('recipe')->with('recipe', $singleRecipe); */
    }

    public function show(Recipe $recipe)
    {
        $singleRecipe = DB::table('recipes')->select('*')
            ->where('id', '=', $recipe->recipe_id)
            ->get();
        // return view('user.profile', ['user' => $user]);
        return view('recipe')->with('recipe', $singleRecipe);
    }
}
