const chosenIngredient = document.getElementById("chosenIngredient");
const amount = document.getElementById("amount");
const list = document.querySelectorAll("ul");
const unit = document.querySelectorAll(".unit");

const addIngredientBtn = document.querySelector(".addIngredientBtn");
// console.log(chosenIngredient.innerHTML);
// console.log(amount.value);
// console.log(unit.value);

// var i =0;
// function doStuff(){
//    var proc = "<span> my text instead x"+i + "</span>" ;
//    document.getElementById("myLi").innerHTML = proc;
//   i++;
// }

addIngredientBtn.addEventListener("click", function (event) {
    event.preventDefault();
    var value = chosenIngredient.options[chosenIngredient.selectedIndex].value;
    var text = chosenIngredient.options[chosenIngredient.selectedIndex].text;
    var id = chosenIngredient.options[chosenIngredient.selectedIndex].id;
    console.log(value);
    console.log(text);
    console.log(id);
    const listItem = document.createElement("li");
    listItem.textContent = text;
    listItem.id = id;
    listItem.value = value;
    // const textnode = document.createTextNode(text);
    // textnode.textContent = text;
    // listItem.appendChild(textnode);

    document.getElementById("myLi").appendChild(listItem);
});

// var clone = chosenIngredient.cloneNode(true);

// document.body.appendChild(clone);
