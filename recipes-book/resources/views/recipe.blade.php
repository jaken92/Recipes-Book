<!doctype html>
<link rel="stylesheet" href="/app.css">

<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipe Book</h1>
    </div>

    <main>
        <section class="recipe-wrapper">
            <article class="recipe-card">
                <h2>{{$recipe[0]->title}}</h2>
                <h3>Category: {{$recipe[0]->category_name}}</h3>
                <div class="recipe-ingredients">
                    <h4>Ingredients:</h4>
                    @foreach ($allIngredients as $singleIngredient)
                    <p>{{$singleIngredient->name}} - {{$singleIngredient->amount}} {{$singleIngredient->unit}}</p>
                    @endforeach
                </div>

                <div class="instructions">
                    <h4>Instructions:</h4>
                    <p>{{$recipe[0]->instructions}}</p>
                </div>

                <p class="author">Author: {{$recipe[0]->user_name}}</p>
            </article>
            <div>
                <a href="/home" class="go-back-button" type="btn">go back</a>
            </div>
        </section>
    </main>

</body>