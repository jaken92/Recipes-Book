<?php echo "this is a single recipe";
?>



<p>{{$recipe[0]->title}}</p>
<p>{{$recipe[0]->user_name}}</p>
<p>{{$recipe[0]->instructions}}</p>
<p>{{$recipe[0]->category_name}}</p>

@foreach ($allIngredients as $singleIngredient)
<p>{{$singleIngredient->name}}</p>
@endforeach

<a href="/dashboard">go back</a>