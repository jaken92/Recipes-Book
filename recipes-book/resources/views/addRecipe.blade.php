<?php

use App\Models\User;
use App\Models\Ingredient;
use App\Models\Category;

?>
<!doctype html>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipe Book</h1>
    </div>
    <section class="create-recipe-section">
        <form action="/addRecipeToDb" method="post">
            <h3>Create Recipe</h3>
            <label for="title" >Input the name of your recipe</label>
            <input type="text" name="title" id="title">
            <label for="category">Choose category for your recipe</label>
            <select name="category" id="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <label for="chosenIngredient">Choose an ingredient to add to your recipe</label>
            <div class="ingredient-list" id="ingredients">
                <div>
                    <select id="chosenIngredient" name="ingredients[0]" id="ingredients">
                        @foreach ($ingredients as $ingredient)
                        <option id="{{$ingredient->id}}" name="ingredients">{{$ingredient->name}}</option>
                        @endforeach
                    </select>
                    <label for="amount">Amount</label>
                    <input id="amount" type="text" name="amount[0]" required="required">
                    <label for="unit">Unit</label>
                    <select id="unit" class="unit" name="unit[0]" data-unit="selected">
                        <option value="gram" data-unit="gram">gram</option>
                        <option value="hg" data-unit="hg">hg</option>
                        <option value="kg">kg</option>
                        <option value="liter">liter</option>
                        <option value="dl">dl</option>
                        <option value="ml">ml</option>
                        <option value="tbsp">tbsp</option>
                        <option value="tsp">tsp</option>
                        <option value="pcs">pcs</option>
                    </select>
                </div>
            </div>
    
            <button class="addIngredientBtn">Add Ingredient</button>
            <div class="textfield-wrapper">
                <div>
                    <label for="instructions"></label>
                    <textarea style="resize: none; margin-top:40px " name="instructions" id="instructions" cols="68" rows="10"></textarea>
                </div>
                <button type="submit">Create Recipe</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    
        <form method="post" action="/addIngredientToDb">
            <h3>Create ingredient</h3>
            <label for="new-ingredient">Ingredient name</label>
            <input type="text" name="new-ingredient" id="new-ingredient">
            <button type="submit">Create Ingredient</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
        <a href="home" class="login-button" type="btn">go back</a>
        @if(\Session::has('success'))
        <p>{!! \Session::get('success') !!}</p>
        @endif

    </section>
   
    <script src="/JS/addRecipe.js">
    </script>
</body>

@include("errors")