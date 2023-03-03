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
                DB::table('ingredients')
                    ->insert([
                        'name' => $newIngredient['new-ingredient'],
                        "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                        "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),

                    ]);
            } else if ($ingredient->name == $newIngredient['new-ingredient']) {

                return back()->withErrors("Ingredient already exists, check the dropdown menu.");
            }

            // return redirect('/recipe');
            return back();
        }

        // return back();

        // var_dump($newIngredient);        
    }
}
