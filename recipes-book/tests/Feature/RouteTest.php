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
    public function test_view_register(): void
    {
        $response = $this->get('register');

        $response->assertStatus(200);
    }
    public function test_view_home_page_as_guest(): void
    {
        $response = $this->get('home');

        $response->assertStatus(200);
        // $response->assertSeeText('login');
    }
    public function test_view_home_page_as_user(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('addRecipe');

        $response->assertStatus(200);
    }
    public function test_view_add_recipe(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('addRecipe');

        $response->assertStatus(200);
    }
}
