<?php

namespace App\Http\Controllers;

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

        $request->only(['new-ingredient']);

        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            $this->validate($request, [
                'title' => 'required|string|min:2',
                'instructions' => 'required|string|min:2',
                'amount' => 'required|array',
                'amount.*' => 'required|int',
            ]);

            $title = $request->only(['title']);
            $category = $request->only(['category']);
            $instructions = $request->only(['instructions']);
            $ingredients = $request->only(['ingredients']);
            $amount = $request->only(['amount']);
            $unit = $request->only(['unit']);

            $recipeId = DB::table('recipes')->insertGetId(
                [
                    'user_id' => $user->id,
                    'title' => $title['title'],
                    'category_id' => $category['category'],
                    'instructions' => $instructions['instructions'],
                    'created_at' => date('Y-m-d H:i:s', strtotime('+1 hours')),
                    'updated_at' => date('Y-m-d H:i:s', strtotime('+1 hours')),
                ]
            );

            for ($i = 0; $i < count($ingredients['ingredients']); $i++) {

                $ingredientId = DB::table('ingredients')->select('id')->where('name', '=', $ingredients['ingredients'][$i])->get();


                DB::table('recipe_ingredients')->insert(
                    [
                        'recipe_id' => $recipeId,
                        'ingredient_id' => $ingredientId[0]->id,
                        'amount' => $amount['amount'][$i],
                        'unit' => $unit['unit'][$i],
                        'created_at' => date('Y-m-d H:i:s', strtotime('+1 hours')),
                        'updated_at' => date('Y-m-d H:i:s', strtotime('+1 hours')),
                    ]
                );
            }

            return back()->with('success', 'Your recipe was succesfully created!');
        }

        return back()->withErrors('Your recipe was not created!');
    }
}
