<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddIngredientToDbController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /*  $this->validate($request, [
            'name' => 'required|string|min:2'
        ]);
 */
        // $newIngredient = $request->only(['new-ingredient']);
        return redirect('/addRecipe');
        // echo $newIngredient;
        //return back()->withErrors("Ingredient already exists, check the dropdown menu.");
    }
}
