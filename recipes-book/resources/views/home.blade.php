<?php echo "this is the dashboard";

?>

<form action="home" method="post">
    <label for="category">Välj kategori att filtrera</label>
    <select name="category">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
    <div>
        @foreach ($ingredients as $ingredient)
        <input type="checkbox" name="remove-ingredient[]" value="{{$ingredient->id}}">
        <label for="checkbox">{{$ingredient->name}}</label>
        @endforeach
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

<a href="home">Reset</a>

@foreach ($recipes as $recipe)
<a href="/recipe/{{$recipe->id}}" value="{{$recipe->title}}" style="display: block;">{{$recipe->title}}</a>
@endforeach

@auth
<a href="addRecipe">Go to add recipe</a>

<div></div>
<form action="logout" method="post">

    <button type="submit">Logout</button>

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
@endauth
@guest
<a href="/">Log in</a>
@endguest