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
        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            $categories = DB::table('categories')->get();
            $ingredients = DB::table('ingredients')->get();
            $recipes = DB::table('recipes')->get();
            $recipeIngredients = DB::table('recipe_ingredients')->get();
            $users = DB::table('users')->select('id', 'name')->get();

            $recipes = DB::table('recipe_ingredients')->select('*')
                ->join('recipes', 'recipes.id', '=', 'recipe_ingredients.recipe_id')
                ->join('ingredients', 'ingredients.id', '=', 'recipe_ingredients.ingredient_id')
                ->get();

            // ->where('recipe_id', '=', 34)
            // return view('dashboard')->with('user', $user)->with('categories', $categories)->with('ingredients', $ingredients)->with('recipes', $recipes)->with('recipe_ingredients', $recipeIngredients)->with('users', $users);

            $recipes = [
                [
                    'title' => 'title',
                    'category' => 'category',
                    'instructions' => 'instructions',
                    'ingredients' => [
                        [
                            'name' => 'lök',
                            'amount' => 6,
                            'unit' => 'st'
                        ],
                        [
                            'name' => 'morot',
                            'amount' => 2,
                            'unit' => 'hg'
                        ]
                    ]

                ]
            ];

            echo $recipes[0]['ingredients'][0]['name'];

            foreach ($recipes as $key => $recipe) {

                /* echo $recipe->id;
                echo $recipe->title;
                echo $recipe->instructions;
                echo $recipe->category_id;
                echo $recipe->ingredient_id;
                echo $recipe->name;
                echo $recipe->amount;
                echo $recipe->unit; */

                /* echo "recipe id: " . $recipe->recipe_id . " recipe title: " . $recipe->title . " recipe instructions: " . $recipe->instructions . " recipe category: " . $recipe->category_id . " ingredient id: " . $recipe->ingredient_id . " ingredient name: " . $recipe->name . " amount: " . $recipe->amount . $recipe->unit . " unit: ";
                echo "<br>"; */
                // echo $recipe->user_id;
            }

            // var_dump($recipes);
            // return view('dashboard')->with('recipes', $recipes);

            // return view('dashboard', ['user' => $user]);
        }

        // return redirect('/');
    }
}
