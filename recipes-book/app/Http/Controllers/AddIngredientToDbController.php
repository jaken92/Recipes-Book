<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddIngredientToDbController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $this->validate($request, [
            'new-ingredient' => 'required|string|min:2',
        ]);

        $newIngredient = $request->only(['new-ingredient']);

        if (Auth::check()) {
            Auth::user();
            $request->user();

            $ingredient = DB::table('ingredients')->where('name', $newIngredient['new-ingredient'])->first();

            if (is_null($ingredient)) {
                DB::table('ingredients')
                    ->insert([
                        'name' => $newIngredient['new-ingredient'],
                        'created_at' => date('Y-m-d H:i:s', strtotime('+1 hours')),
                        'updated_at' => date('Y-m-d H:i:s', strtotime('+1 hours')),

                    ]);
            } elseif ($ingredient->name == $newIngredient['new-ingredient']) {

                return back()->withErrors('Ingredient already exists, check the dropdown menu.');
            }

            return back()->with('success', 'Your ingredient was succesfully added!');
        }

        return redirect('/');
    }
}
