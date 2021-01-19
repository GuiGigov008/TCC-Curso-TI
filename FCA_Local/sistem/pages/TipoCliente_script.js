const fisico = document.querySelector("#radioSuccess1");
const juridico = document.querySelector("#radioSuccess2");
const clientes = document.querySelector("#Clientes");

const fisica = window.newFisico;
const juridica = window.newJuridico;

window.addEventListener("load", (event) => {
    fisico.addEventListener("change", (event) => {

        clientes.innerHTML = "";

        fisica.map((op) => {
            let newEl = document.createElement("option");
            newEl.innerText = op;
            newEl.setAttribute("value", op);

            console.log(newEl)
            clientes.appendChild(newEl);
            return newEl;
        });
    })

    juridico.addEventListener("change", (event) => {

        clientes.innerHTML = "";

        juridica.map((op) => {
            let newEl = document.createElement("option");
            newEl.innerText = op;
            newEl.setAttribute("value", op);

            clientes.appendChild(newEl);
            return newEl;
        });
    })
})