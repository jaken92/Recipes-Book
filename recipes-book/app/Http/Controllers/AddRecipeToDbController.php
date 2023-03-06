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
        $this->validate($request, [
            /*  'ingredient-name' => 'required|string|min:2',
            'ingredient-amount' => 'required|string|min:2',
            'ingredient-unit' => 'required|string|min:2', */
            'title' => 'required|string|min:2',
            'description' => 'required|string|min:2',
        ]);

        $title = $request->only(['title']);
        $category = $request->only(['category']);
        $description = $request->only(['description']);
        $ingredients = $request->only(['ingredients']);

        var_dump($title);
        var_dump($category);
        var_dump($description);
        var_dump($ingredients);

        // $newIngredient = $request->only(['new-ingredient']);

        /* if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            $ingredient = DB::table('ingredients')->where('name', $newIngredient['new-ingredient'])->first();
            // print_r($user);
            // print_r($ingredients);
            // var_dump($ingredient);
            if (is_null($ingredient)) {
                DB::table('ingredients')
                    ->insert([
                        'name' => $newIngredient['new-ingredient'],
                        "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                        "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),

                    ]);
            } else if ($ingredient->name == $newIngredient['new-ingredient']) {

                return back()->withErrors("Could not add your recipe");
            }

            // return redirect('/recipe');
            return back();
        } */

        // return back();

        // var_dump($newIngredient);        
    }
}
