<?php 
use App\Models\User;
use App\Models\Ingredients;
echo "Here you can add a recipe";
// print_r($ingredients);
// echo $ingredients[0]['name'];
// echo $ingredients[0]->name;
// foreach($ingredients as $ingredient){
//     echo $ingredient->name;
// }
?>
<form action="">
    <div>
        <label for="ingredients">Välj en ingredient för att lägga till i ditt recept</label>
        <select name="ingredients">
            @foreach ($ingredients as $ingredient)
                <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
            @endforeach
        </select>
        <label for="amount">Mängd</label>
        <input type="text">
        <label for="unit">Enhet</label>
        <select name="unit">
            <option>gram</option>
            <option>hg</option>
            <option>kg</option>
            <option>liter</option>
            <option>dl</option>
            <option>ml</option>
            <option>msk</option>
            <option>tsk</option>
            <option>krm</option>
            <option>st</option>
        </select>
    </div>
    <button action="Här ska det va controller heheh" type="submit">Lägg till ingredients</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
<a href="javascript:history.back()" type="button">go back</a>