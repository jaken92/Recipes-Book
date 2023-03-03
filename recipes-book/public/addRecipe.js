const e = document.getElementById("chosenIngredient");
const amount = document.getElementById("amount");

const unit = document.querySelectorAll(".unit");

// console.log(chosenIngredient.innerHTML);
// console.log(amount.value);
// console.log(unit.value);

var value = e.options[e.selectedIndex].value;
var text = e.options[e.selectedIndex].text;

console.log(value);
