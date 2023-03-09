<p>This is the reg page</p>
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
<a href="/">Go back</a>

@include("errors")