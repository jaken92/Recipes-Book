<?php

use App\Models\User;
use App\Models\Ingredient;
use App\Models\Category;

echo "Here you can add a recipe";
// print_r($ingredients);
// echo $ingredients[0]['name'];
// echo $ingredients[0]->name;
// foreach($ingredients as $ingredient){
//     echo $ingredient->name;
// }
?>
<!doctype html>
<link rel="stylesheet" href="/app.css">
<body>
    <form action="">
        <div>
            <label for="ingredients">Välj en ingredient för att lägga till i ditt recept</label>
            <select id="chosenIngredient" name="ingredients">
                @foreach ($ingredients as $ingredient)
                <option id="{{$ingredient->id}}">{{$ingredient->name}}</option>
                @endforeach
            </select>
            <label for="amount">Mängd</label>
            <input id="amount" type="text">
            <label for="unit">Enhet</label>
            <select class="unit" name="unit">
                <option>gram</option>
                <option>hg</option>
                <option>kg</option>
                <option>liter</option>
                <option>dl</option>
                <option>ml</option>
                <option>msk</option>
                <option>tsk</option>
                <option>krm</option>
                <option>st</option>
            </select>
        </div>
        <button action="Här ska det va controller heheh" type="submit">Lägg till ingredients</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    <form action="">
        <div>
            <label for="title">Ange namn för ditt recept</label>
            <input type="text" name="title">
            <label for="category">Välj kategori för ditt recept</label>
            <select name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div>
                <label for="description"></label>
                <textarea style="resize: none; margin-top:40px " name="description" id="" cols="68" rows="10"></textarea>
            </div>
            <button type="submit">Skapa recept</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    <form method="post" action="/addIngredientToDb">
        <h3>Create ingredient</h3>
        <label for="new-ingredient">Ingredient name</label>
        <input type="text" name="new-ingredient">
        <button type="submit">Create Ingredient</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    <a href="javascript:history.back()" type="button">go back</a>
    <script src="/addRecipe.js "></script>
</body>

@include("errors")