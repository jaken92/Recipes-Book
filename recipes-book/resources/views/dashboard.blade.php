<?php echo "this is the dashboard";

?>

@foreach ($recipes as $recipe)
<a href="/{{$recipe->id}}" data-recipeId="{{$recipe->id}}" id="{{$recipe->id}}" style="display: block;">{{$recipe->title}}</a>
@endforeach

@auth
<a href="addRecipe">Go to add reciepe</a>
@endauth
<div></div>
<form action="logout" method="post">

    <button type="submit">Logout</button>

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>