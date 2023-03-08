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

<a href="guest">Continue as guest</a>
{{-- <form action="/guest" method="get">
    <button>Continue as guest</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form> --}}