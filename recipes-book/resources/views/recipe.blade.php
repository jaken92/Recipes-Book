
<!doctype html>
<link rel="stylesheet" href="/app.css">
<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipes Book</h1>
    </div>
    <p>{{$recipe[0]->title}}</p>
    <p>Category: {{$recipe[0]->category_name}}</p>
    <p>Ingredients:</p>
    @foreach ($allIngredients as $singleIngredient)
    <p>{{$singleIngredient->name}} - {{$singleIngredient->amount}} {{$singleIngredient->unit}}</p>
    @endforeach

    <p>Instructions:</p>
    <p>{{$recipe[0]->instructions}}</p>


    <p>Author: {{$recipe[0]->user_name}}</p>

    <a href="/home">go back</a> 
</body>


