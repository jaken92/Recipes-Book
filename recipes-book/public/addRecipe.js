const chosenIngredient = document.getElementById("chosenIngredient");
const amount = document.getElementById("amount");
const list = document.querySelector("ul");
// const unit = document.getElementById("#unit");
const unit = document.querySelector(".unit");

const addIngredientBtn = document.querySelector(".addIngredientBtn");

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
    // console.log(unit.options.value);
    // console.log(unit.options[unit.selectedIndex].text);
    list.innerHTML += `<li><span>${value}</span> <span>${
        amount.value
    }</span> <span>${
        unit.options[unit.selectedIndex].text
    }</span> <button class="delete-button">Delete</button></li>`;

    // document.getElementById("myLi").appendChild(listItem);
    let listLength = list.childElementCount;
    console.log(listLength);
    addDeleteEvent();
});

// add eventlistener to each deletebutton.
function addDeleteEvent() {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const row = button.parentNode;
            row.remove();
        });
    });
}
// const nodeList = list.childNodes;

/* document
    .getElementById("parent")
    .removeChild(document.getElementById("parent").children[2]); */

// var clone = chosenIngredient.cloneNode(true);

// document.body.appendChild(clone);

// deleteButtons.forEach((button) => {
//     button.addEventListener("click", () => {
//         console.log("imma btn");
//     });
// });
