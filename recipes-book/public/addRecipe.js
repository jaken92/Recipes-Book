const chosenIngredient = document.getElementById("chosenIngredient");
const amount = document.getElementById("amount");
const list = document.querySelector("ul");
const unit = document.querySelector(".unit");
const addIngredientBtn = document.querySelector(".addIngredientBtn");
const ingredientList = document.querySelector(".ingredient-list");
const button = document.querySelector(".delete-button");

const test = document.getElementById("testing");

let chosenIngredientClone = chosenIngredient.cloneNode(true);
let amountClone = amount.cloneNode(true);
let unitClone = unit.cloneNode(true);

let ingredientListid = 1;

addIngredientBtn.addEventListener("click", function (event) {
    event.preventDefault();

    const newChocie = document.createElement("div");
    let amountLabel = document.createElement("label");
    let unitLabel = document.createElement("label");

    let newChosenIngredientClone = chosenIngredientClone.cloneNode(true);
    amountLabel.textContent = "Mängd";
    let newAmountClone = amountClone.cloneNode(true);
    unitLabel.textContent = "Enhet";
    let newUnitClone = unitClone.cloneNode(true);

    const singleDeleteBtn = document.createElement("button");
    singleDeleteBtn.textContent = "Delete";
    singleDeleteBtn.classList.add("delete-button");

    newChosenIngredientClone.name = `ingredients[${ingredientListid}]`;
    newAmountClone.name = `amount[${ingredientListid}]`;
    newUnitClone.name = `unit[${ingredientListid}]`;

    newChocie.appendChild(newChosenIngredientClone);
    newChocie.appendChild(amountLabel);
    newChocie.appendChild(newAmountClone);
    newChocie.appendChild(unitLabel);
    newChocie.appendChild(newUnitClone);
    newChocie.appendChild(singleDeleteBtn);

    ingredientList.appendChild(newChocie);
    ingredientListid++;

    addDeleteEvent();
});

// add eventlistener to each deletebutton.
function addDeleteEvent() {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", () => {
            button.parentNode.remove();
        });
    });
}
