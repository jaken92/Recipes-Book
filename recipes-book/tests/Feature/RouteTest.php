<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Recipe_ingredient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    // testing login
    public function test_view_login_as_user(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $response = $this->followingRedirects()->actingAs($user)->get('/');

        $response->assertSeeText('Go to add recipe');
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
                'password' => '123',
            ]);

        $response->assertSeeText('Woops! Please try to login again');
        $response->assertStatus(200);
    }

    // testing logout
    public function test_logout_user(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->post('logout');

        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    // testing register user
    public function test_view_register(): void
    {
        $response = $this->get('register');

        $response->assertStatus(200);
    }

    public function test_register_user(): void
    {
        $response = $this
            ->followingRedirects()
            ->post('saveUser', [
                'email' => 'rune@yrgo.se',
                'name' => 'Rune',
                'password' => '1234',
            ]);

        $response->assertSeeText('Your account was succesfully created!');

        $response->assertStatus(200);
    }

    public function test_register_user_fails(): void
    {
        $response = $this
            ->followingRedirects()
            ->post('saveUser', [
                'email' => 'rune@yrgo.se',
                'name' => 'Rune',
                'password' => '123',
            ]);

        $response->assertSeeText('The password field must be at least 4 characters');

        $response->assertStatus(200);
    }

    // testing home page
    public function test_view_home_page_as_guest(): void
    {
        $response = $this->get('home');
        $response->assertSeeText('Login');
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

    public function test_recipe_page(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $category = new Category();
        $category->name = 'soppa';
        $category->save();

        $ingredient1 = new Ingredient();
        $ingredient1->name = 'tomat';
        $ingredient1->save();

        $ingredient2 = new Ingredient();
        $ingredient2->name = 'potatis';
        $ingredient2->save();

        $ingredient3 = new Ingredient();
        $ingredient3->name = 'ägg';
        $ingredient3->save();

        $recipe = new Recipe();
        $recipe->user_id = 1;
        $recipe->title = 'tomat soppa';
        $recipe->category_id = 1;
        $recipe->instructions = 'fbfbxbfxbfbfd';
        $recipe->save();

        $recipeIngredients1 = new Recipe_ingredient();
        $recipeIngredients1->recipe_id = 1;
        $recipeIngredients1->ingredient_id = 1;
        $recipeIngredients1->amount = '4';
        $recipeIngredients1->unit = 'ml';
        $recipeIngredients1->save();

        $recipeIngredients2 = new Recipe_ingredient();
        $recipeIngredients2->recipe_id = 1;
        $recipeIngredients2->ingredient_id = 2;
        $recipeIngredients2->amount = '8';
        $recipeIngredients2->unit = 'hg';
        $recipeIngredients2->save();

        // die(var_dump($recipe));

        // $response = $this->get('home');
        $response = $this
            ->followingRedirects()
            ->get("/recipe/$recipe->id");

        // die(var_dump($recipeIngredients2));
        $response->assertSeeText('tomat soppa');

        $response->assertStatus(200);
    }

    // testing adding recipe
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
        $response->assertSeeText('Register');
        $response->assertStatus(200);
    }

    public function test_add_recipe_to_db(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $ingredient = new Ingredient();
        $ingredient->name = 'tomat';
        $ingredient->save();

        $ingredient = new Ingredient();
        $ingredient->name = 'potatis';
        $ingredient->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->from('addRecipe')
            ->post('/addRecipeToDb', [
                'title' => 'tomat soppa',
                'category' => 'soppa',
                'ingredients' => ['tomat', 'potatis'],
                'amount' => ['4', '8'],
                'unit' => ['ml', 'hg'],
                'instructions' => 'fbfbxbfxbfbfd',
            ]);

        $response->assertSeeText('Your recipe was succesfully created!');

        $response->assertStatus(200);
    }

    public function test_add_recipe_to_db_fails(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $ingredient = new Ingredient();
        $ingredient->name = 'tomat';
        $ingredient->save();

        $ingredient = new Ingredient();
        $ingredient->name = 'potatis';
        $ingredient->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->from('addRecipe')
            ->post('/addRecipeToDb', [
                'title' => 'tomat soppa',
                'category' => 'soppa',
                'ingredients' => ['tomat', 'potatis'],
                'amount' => ['4', '8'],
                'unit' => ['ml', 'hg'],
            ]);

        $response->assertSeeText('The instructions field is required');

        $response->assertStatus(200);
    }

    // testing adding ingredient
    public function test_add_ingredient_to_db(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->from('addRecipe')
            ->post('/addIngredientToDb', [
                'new-ingredient' => 'sill',
            ]);

        $response->assertSeeText('Your ingredient was succesfully added!');

        $response->assertStatus(200);
    }

    public function test_add_ingredient_to_db_fails(): void
    {
        $user = new User();
        $user->name = 'Rune';
        $user->email = 'rune@yrgo.se';
        $user->password = Hash::make('1234');
        $user->save();

        $ingredient = new Ingredient();
        $ingredient->name = 'tomat';
        $ingredient->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->from('addRecipe')
            ->post('/addIngredientToDb', [
                'new-ingredient' => 'tomat',
            ]);

        $response->assertSeeText('Ingredient already exists, check the dropdown menu.');

        $response->assertStatus(200);
    }
}
