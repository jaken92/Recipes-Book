<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class AddIngredientToDbController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'new-ingredient' => 'required|string|min:2'
        ]);

        $newIngredient = $request->only(['new-ingredient']);

        if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();

            $ingredient = DB::table('ingredients')->where('name', $newIngredient['new-ingredient'])->first();
            // print_r($user);
            // print_r($ingredients);
            // var_dump($ingredient);
            if (is_null($ingredient)) {
                // echo "not exist";
                return back()->withErrors("Ingredient already exists, check the dropdown menu.");
            } else if ($ingredient->name == $newIngredient['new-ingredient']) {
                echo "exist";


                return back();
            } else {
                // echo "not exist";
                return back()->withErrors("Ingredient already exists, check the dropdown menu.");
            }
            // return redirect('/recipe');
            // return back();
        }

        // return back();

        // var_dump($newIngredient);        
    }
}
