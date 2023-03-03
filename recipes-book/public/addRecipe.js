const chosenIngredient = document.getElementById("chosenIngredient");
const amount = document.getElementById("amount");
const list = document.querySelectorAll("ul");
const unit = document.querySelectorAll(".unit");

// console.log(chosenIngredient.innerHTML);
// console.log(amount.value);
// console.log(unit.value);

chosenIngredient.addEventListener("change", () => {
    var value = chosenIngredient.options[chosenIngredient.selectedIndex].value;
    var text = chosenIngredient.options[chosenIngredient.selectedIndex].text;
    var id = chosenIngredient.options[chosenIngredient.selectedIndex].id;
    console.log(value);
    console.log(text);
    console.log(id);
    const span = document.createElement("li");
    span.textContent = text;
    span.id = id;

    list.appendChild(span);
});

// var clone = chosenIngredient.cloneNode(true);

// document.body.appendChild(clone);
