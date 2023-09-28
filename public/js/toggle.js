const toggle = document.querySelector(".add-todo-button");
const input = document.querySelector(".input-todo");
const inputTable = document.querySelector(".input-table");
toggle.addEventListener("click", () => {
  input.classList.toggle("toggle");
  if (input.classList.contains("toggle")) {
    toggle.innerHTML = "x";
  } else {
    toggle.innerHTML = "+";
  }
});

document.addEventListener("click", (e) => {
  if (!inputTable.contains(e.target) && !toggle.contains(e.target)) {
    input.classList.remove("toggle");
    toggle.innerHTML = "+";
  }
});
