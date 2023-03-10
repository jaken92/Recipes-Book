<?php

use App\Http\Controllers\AddIngredientToDbController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AddRecipeController;
use App\Http\Controllers\AddRecipeToDbController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('login')->middleware("guest");

Route::get('dashboard', DashboardController::class);

Route::post('dashboard', DashboardController::class);

Route::post('login', LoginController::class);

Route::get('addRecipe', AddRecipeController::class)->middleware('auth');

Route::get('db', DbController::class);

Route::post('addIngredientToDb', AddIngredientToDbController::class);

Route::post('addRecipeToDb', AddRecipeToDbController::class);

Route::post('logout', LogoutController::class);

Route::view('register', 'registerUser')->name('registerUser');

Route::post('saveUser', RegisterUserController::class);

Route::get('recipe/{recipe}', [RecipeController::class, 'show']);

Route::post('dashboard', [DashboardController::class, 'filter'])->name('dashboard');
