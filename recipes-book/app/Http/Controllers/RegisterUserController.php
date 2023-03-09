<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|string|min:2',
            'email' => 'required|string|min:2',
            'password' => 'required|string|min:4'
        ]);

        $name = $request->only(['username']);
        $email = $request->only(['email']);
        $password = $request->only(['password']);

        $password = Hash::make($password['password']);

        $newUser = DB::table('users')->insert(
            [
                'name' => $name['username'],
                'email' => $email['email'],
                'password' => $password,
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]
        );

        return redirect('register')->withErrors("Could not register");
    }
}
