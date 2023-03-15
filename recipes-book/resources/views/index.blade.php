<!doctype html>
<link rel="stylesheet" href="/app.css">

<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipe Book</h1>
    </div>
    <div class="login-container">
        <form action="/login" method="post">
            <div>
                <label for="email">Email</label>
                <input name="email" id="email" type="email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password" type="password" />
            </div>
            <div class="login-btn-container">
                <button type="submit">Login</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>

    </div>

    <div class="alt-buttons">
        <a href="register" class="login-button">Register User</a>
        <a href="home" class="login-button">Continue as guest</a>
    </div>
</body>


@include("errors")