<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        echo "hello";
        /* DB::table('ingredients')
            ->insert([
                'name' => 'lök',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),

            ]);
        DB::table('ingredients')
            ->insert([
                'name' => 'potatis',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]);
        DB::table('ingredients')
            ->insert([
                'name' => 'sill',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]);
        DB::table('ingredients')
            ->insert([
                'name' => 'tomat',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]);
        DB::table('ingredients')
            ->insert([
                'name' => 'gräddfil',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]);
        DB::table('ingredients')
            ->insert([
                'name' => 'gräslök',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]);
        DB::table('ingredients')
            ->insert([
                'name' => 'ägg',
                "created_at" =>  date('Y-m-d H:i:s', strtotime("+1 hours")),
                "updated_at" => date('Y-m-d H:i:s', strtotime("+1 hours")),
            ]); */

        // DB::table('ingredients')->delete();

        /* $max = DB::table('ingredients')->max('id') + 1;
        DB::statement("ALTER TABLE ingredients AUTO_INCREMENT =  $max"); */

        $result = DB::select('select * from ingredients');

        print_r($result);
    }
}
