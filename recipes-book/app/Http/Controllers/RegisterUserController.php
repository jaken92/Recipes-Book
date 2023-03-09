<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegisterUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|string|min:2',
            'email' => 'required|string|min:2',
            'password' => 'required|string|min:4'
        ]);

        $name = $request->only(['name']);
        $email = $request->only(['email']);
        $password = $request->only(['password']);

        $password = Hash::make($password['password']);

        // $newUser = User::create(request(['name', 'email', 'password']));

        $newUser = DB::table('users')->insert(
            [
                'name' => $name['name'],
                'email' => $email['email'],
                'password' => $password,
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]
        );

        if (!$newUser) {
            return redirect('register')->withErrors("Could not register");
        }

        return redirect('register');
    }
}
