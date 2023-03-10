<?php echo "this is the dashboard";

?>

<form action="dashboard" method="post">
    <label for="category">Välj kategori att filtrera</label>
    <select name="category">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

@foreach ($recipes as $recipe)
<a href="{{$recipe->id}}" data-recipeId="{{$recipe->id}}" id="{{$recipe->id}}" style="display: block;">{{$recipe->title}}</a>
@endforeach

@auth
<a href="addRecipe">Go to add reciepe</a>

<div></div>
<form action="logout" method="post">

    <button type="submit">Logout</button>

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
@endauth
@guest
<a href="/">Log in</a>
@endguest