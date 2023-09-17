<!doctype html>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipe Book</h1>
    </div>
    <div class="searchfield-container">
        <form action="home" method="post">
            <label for="category">Choose a category to filter</label>
            <select id="category" name="category">
                @foreach ($categories as $category)
                <option id="category" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>
    
            <div class="checkboxes hidden">
                <p>Check off the ingredients you dont want to be included in your search:</p>
                @foreach ($ingredients as $ingredient)
                <input id="{{$ingredient->id}}" type="checkbox" name="remove-ingredient[]" value="{{$ingredient->id}}">
                <label for="{{$ingredient->id}}">{{$ingredient->name}}</label>
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
    <div class="nav-section">
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
        <div class="logout-btn-container">
            <a href="/" class="login-button" type="btn">Login</a>
        </div>
        @endguest

    </div>

    <script src="/JS/home.js">
    </script>
</body>