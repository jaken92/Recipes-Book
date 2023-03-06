<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddRecipeToDbController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $newIngredient = $request->only(['new-ingredient']);

        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            $this->validate($request, [
                'title' => 'required|string|min:2',
                'instructions' => 'required|string|min:2',
                'amount' => 'required|array',
                'amount.*' => 'required|int'
            ]);

            $title = $request->only(['title']);
            $category = $request->only(['category']);
            $instructions = $request->only(['instructions']);
            $ingredients = $request->only(['ingredients']);
            $amount = $request->only(['amount']);
            $unit = $request->only(['unit']);

            //  var_dump($title);
            // var_dump($category);
            // var_dump($instructions);
            var_dump($ingredients);
            // var_dump($amount);
            // var_dump($unit);

            // echo $unit['unit'][0];

            // echo $ingredients['ingredients'][0] . $amount['amount'][0] . $unit['unit'][0];

            // $ingredient = DB::table('ingredients')->where('name', $ingredients['ingredients'])->first();

            //insert into table and get last id.

            $recipeId = DB::table('recipes')->insertGetId(
                [
                    'user_id' => $user->id,
                    'title' => $title['title'],
                    'category_id' => $category['category'],
                    'instructions' => $instructions['instructions'],
                    "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                    "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
                ]
            );
            // var_dump($recipeId);
            // echo $recipeId;


            // var_dump($ingredientId);  
            for ($i = 0; $i < count($ingredients['ingredients']); $i++) {

                /* $ingredientId = DB::select('select id from ingredients where name =' . "\'" . $ingredients['ingredients'][$i] . "\'"); */

                $ingredientId = DB::table('ingredients')->select('id')->where("name", "=", $ingredients['ingredients'][$i])->get();

                $recipeId = DB::table('recipe_ingredients')->insert(
                    [
                        'recipe_id' => $recipeId,
                        'ingredient_id' => $ingredientId[0]->id,
                        'amount' => $amount['amount'][$i],
                        'unit' => $unit['unit'][$i],
                        "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                        "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
                    ]
                );
            }

            // var_dump($productId);
            // echo $productId;
            // print_r($user);
            // print_r($ingredients);
            // var_dump($ingredient);

            /* if (is_null($ingredient)) {
                DB::table('ingredients')
                    ->insert([
                        'name' => $newIngredient['new-ingredient'],
                        "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                        "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),

                    ]);
            } else if ($ingredient->name == $newIngredient['new-ingredient']) {

                return back()->withErrors("Could not add your recipe");
            } */

            // return redirect('/recipe');
            // return back();
        }

        // return back()->withErrors("You can not add recipes");

        // var_dump($newIngredient);        
    }
}
