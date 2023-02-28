<h1>This is the guest view</h1>

<form action="recipe" method="post">
    <button>Go to single Recipe</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>