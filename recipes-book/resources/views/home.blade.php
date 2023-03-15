<!doctype html>
<link rel="stylesheet" href="/home.css">
<link rel="stylesheet" href="/app.css">

<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipes Book</h1>
    </div>
    <div class="searchfield-container">
        <form action="home" method="post">
            <label for="category">Välj kategori att filtrera</label>
            <select name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>
    
            <div class="checkboxes hidden">
                <p>Check off the ingredients you dont want to be included in your search:</p>
                @foreach ($ingredients as $ingredient)
                <input type="checkbox" name="remove-ingredient[]" value="{{$ingredient->id}}">
                <label for="checkbox">{{$ingredient->name}}</label>
                @endforeach
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
        <button class="show-checkboxes block">Filter by ingredients</button>
        <a href="home" class="reset-btn hidden test" type="btn">Reset</a>
    </div>


    <section class="recipes-section">
        <ul class="recipes-list">
        @foreach ($recipes as $recipe)
            <li><a href="/recipe/{{$recipe->id}}" value="{{$recipe->title}}">{{$recipe->title}}</a></li>
        @endforeach
        </ul>
    </section>

    @auth
    <div class="nav-btn-container">
        <a href="addRecipe" class="login-button" type="btn">Go to add recipe</a>

        <form action="logout" method="post">
    
            <button type="submit">Logout</button>
    
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    </div>

    @endauth
    @guest
    <a href="/" class="login-button" type="btn">Login</a>
    @endguest
    <script src="home.js">
    </script>
</body>