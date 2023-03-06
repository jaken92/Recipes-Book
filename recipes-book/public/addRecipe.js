const chosenIngredient = document.getElementById("chosenIngredient");
const amount = document.getElementById("amount");
const list = document.querySelector("ul");
// const unit = document.getElementById("#unit");
const unit = document.querySelector(".unit");
const addIngredientBtn = document.querySelector(".addIngredientBtn");
const ingredientList = document.querySelector(".ingredient-list");

const test = document.getElementById("testing");

// var i =0;
// function doStuff(){
//    var proc = "<span> my text instead x"+i + "</span>" ;
//    document.getElementById("myLi").innerHTML = proc;
//   i++;
// }

let ingredientListid = 0;

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
    // console.log(unit.options.value);
    // console.log(unit.options[unit.selectedIndex].text);
    /*  list.innerHTML += `<li data-recipeIngredient="${ingredientListid}">
    <span name="ingredient-name">${value}</span> 
    <span name="ingredient-amount">${amount.value}</span> 
    <span name="ingredient-unit">${
        unit.options[unit.selectedIndex].text
    }</span> 
    <button class="delete-button">Delete</button></li>`; */

    const newChocie = document.createElement("div");

    let chosenIngredientClone = chosenIngredient.cloneNode(true);
    let amountClone = amount.cloneNode(true);
    let unitClone = unit.cloneNode(true);

    chosenIngredientClone.name = `ingredients[${ingredientListid}]`;

    newChocie.appendChild(chosenIngredientClone);
    newChocie.appendChild(amountClone);
    newChocie.appendChild(unitClone);

    ingredientList.appendChild(newChocie);

    // document.getElementById("myLi").appendChild(listItem);
    let listLength = list.childElementCount;
    console.log(listLength);
    addDeleteEvent();
    ingredientListid++;
});

// add eventlistener to each deletebutton.
function addDeleteEvent() {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", () => {
            // const row = button.parentNode;
            // row.remove();
            button.parentNode.remove();
        });
    });
}
// const nodeList = list.childNodes;

// document.getElementById("parent");
// .removeChild(document.getElementById("parent").children[2]);

let chosenIngredientClone = chosenIngredient.cloneNode(true);
let amountClone = amount.cloneNode(true);
let unitClone = unit.cloneNode(true);

/* test.appendChild(chosenIngredientClone);
test.appendChild(amountClone);
test.appendChild(unitClone); */

/* test.appendChild(chosenIngredientClone);
test.appendChild(amountClone);
test.appendChild(unitClone); */

// chosenIngredientClone.name = "blue";

// console.log(test);

// deleteButtons.forEach((button) => {
//     button.addEventListener("click", () => {
//         console.log("imma btn");
//     });
// });
