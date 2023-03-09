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
<a href="dashboard">Continue as guest</a>
<form method="get" action="dashboard">
    <button type="submit">Continye as gueesst</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>