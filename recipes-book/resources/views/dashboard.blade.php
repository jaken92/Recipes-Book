<?php echo "this is the dashboard";

?>
<form action="recipe" method="post">
    <button>Go to single Recipe</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

@foreach ($recipes as $recipe)
<a href="" data-recipeId="{{$recipe->recipe_id}}" id="{{$recipe->recipe_id}}" style="display: block;">{{$recipe->recipe_id}}{{$recipe->title}}</a>
@endforeach

<!-- @foreach ($recipes as $recipe)
<p><?php echo "recipe id: " . $recipe->recipe_id . " recipe title: " . $recipe->title . " recipe instructions: " . $recipe->instructions . " recipe category: " . $recipe->category_id . " ingredient id: " . $recipe->ingredient_id . " ingredient name: " . $recipe->name . " amount: " . $recipe->amount . $recipe->unit . " unit: ";
    echo "<br>"; ?></p>
@endforeach -->

<form action="addRecipe" method="get">
    <button>Go to add Recipe page</button>
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
</form>