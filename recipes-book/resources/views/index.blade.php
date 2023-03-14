
<!doctype html>
<link rel="stylesheet" href="/app.css">
<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipes Book</h1>
    </div>
    <form action="/login" method="post">
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        </div>
        <button type="submit">Login</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    
    <a href="register">Register User</a>
    <a href="home">Continue as guest</a>
    <form method="get" action="recipes">
        <button type="submit">Continye as gueesst</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
</body>


@include("errors")