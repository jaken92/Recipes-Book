<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_view_login(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_view_login_as_user(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_view_that_does_not_exist(): void
    {
        $response = $this->get('dashboard');

        $response->assertStatus(404);
    }
    public function test_login_user(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $response = $this->get('/');

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'rune@yrgo.se',
                'password' => '1234',
            ]);

        $response->assertSeeText('Go to add recipe');
        $response->assertStatus(200);
    }
    public function test_login_wrong_credentials(): void
    {
        $response = $this->get('/');

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'rune@yrgo.se',
                'password' => '1234',
            ]);

        $response->assertSeeText('Woops! Please try to login again');
        $response->assertStatus(200);
    }


    public function test_view_register(): void
    {
        $response = $this->get('register');

        $response->assertStatus(200);
    }
    public function test_register_user(): void
    {
        $response = $this
            ->followingRedirects()
            ->get('register', [
                'email' => 'rune@yrgo.se',
                'name' => 'Rune',
                'password' => '1234',
            ]);

        // $response->assertSeeText('Your account was succesfully created!');

        $response->assertStatus(200);
    }



    public function test_view_home_page_as_guest(): void
    {
        $response = $this->get('home');
        $response->assertSeeText('Log in');
        $response->assertStatus(200);
    }
    public function test_view_home_page_as_user(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('home');
        $response->assertSeeText('Go to add recipe');
        $response->assertSeeText('Logout');

        $response->assertStatus(200);
    }



    /* public function test_view_recipe_as_guest(): void
    {
        $response = $this
            ->followingRedirects()
            ->get('addRecipe');
        $response->assertSeeText('Login');
        $response->assertStatus(200);
    } */
    /* public function test_view_recipe_as_user(): void
    {
        $response = $this
            ->followingRedirects()
            ->get('addRecipe');
        $response->assertSeeText('Login');
        $response->assertStatus(200);
    } */



    public function test_view_add_recipe_as_user(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('addRecipe');
        $response->assertSeeText('Create ingredient');

        $response->assertStatus(200);
    }
    public function test_view_add_recipe_as_guest(): void
    {
        $response = $this
            ->followingRedirects()
            ->get('addRecipe');
        $response->assertSeeText('Login');
        $response->assertStatus(200);
    }
    /* public function test_add_recipe_to_db(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('addRecipe');
        $response->assertSeeText('Create ingredient');

        $response->assertStatus(200);
    } */
    /* public function test_add_ingredient_to_db(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('addRecipe');
        $response->assertSeeText('Create ingredient');

        $response->assertStatus(200);
    } */
}
