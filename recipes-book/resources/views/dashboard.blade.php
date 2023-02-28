<?php echo "this is the dashboard";

?>
<form action="recipe" method="post">
    <button>Go to single Recipe</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

<form action="addRecipe" method="post">
    <button>Go to add Recipe page</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>