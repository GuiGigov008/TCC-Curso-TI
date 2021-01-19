
const table = document.querySelector("table#revisao");
const clear = document.querySelector("button#limpar");

clear.addEventListener("click", () => {
    table.innerHTML = "";
})