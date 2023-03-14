const checkboxes = document.querySelector(".checkboxes");
const btn = document.querySelector(".show-checkboxes");
const resetBtn = document.querySelector(".reset-btn");

btn.addEventListener("click", () => {
    btn.classList.toggle("hidden");
    btn.classList.toggle("block");
    checkboxes.classList.toggle("hidden");
    resetBtn.classList.toggle("hidden");
    resetBtn.classList.toggle("block");
});
