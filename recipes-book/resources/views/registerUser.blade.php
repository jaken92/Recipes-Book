<p>This is the reg page</p>
<form method="post" action="saveUser">
    <label for="email">Enter email</label>
    <input name="email" type="text">

    <label for="name">Enter username</label>
    <input name="name" type="text">

    <label for="">Enter password</label>
    <input name="password" type="text">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <button type="submit">sumbit</button>
</form>
<a href="/">Go back</a>

@include("errors")