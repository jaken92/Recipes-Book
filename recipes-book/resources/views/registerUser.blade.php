<!doctype html>
<link rel="stylesheet" href="/app.css">

<body>
    <div class="hero-container">
        <img class="hero" src="/images/hero.jpg" alt="">
        <h1 class="hero-text">Recipes Book</h1>
    </div>
    <form method="post" action="saveUser">
        <label for="email">Enter email</label>
        <input name="email" type="text">

        <label for="name">Enter username</label>
        <input name="name" type="text">

        <label for="">Enter password</label>
        <input name="password" type="text">

        <button type="submit">sumbit</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    @if(\Session::has('success'))
    <p>{!! \Session::get('success') !!}</p>
    @endif
    <a href="/" class="go-back-button" type="btn">Go back</a>
</body>


@include("errors")