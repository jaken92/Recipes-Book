const checkboxes = document.querySelector(".checkboxes");
const btn = document.querySelector(".show-checkboxes");

btn.addEventListener("click", () => {
    btn.classList.toggle("hidden");
    checkboxes.classList.toggle("hidden");
});
