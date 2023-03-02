<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        /* if (Auth::check()) {
            $user = Auth::user();
            $user = $request->user();
            // print_r($user); 

            // return redirect('/recipe');
            return back();
        } */

        // return back();

        var_dump($newIngredient);
        // return back()->withErrors("Ingredient already exists, check the dropdown menu.");
    }
}
