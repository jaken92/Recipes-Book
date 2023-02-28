<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AddRecipeController;

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

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::post('login', LoginController::class);


Route::post('guest', GuestController::class);

Route::post('recipe', RecipeController::class);

Route::post('addRecipe', AddRecipeController::class)->middleware('auth');
