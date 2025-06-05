function adicionarTime() {
    const container = document.getElementById("timesContainer");
    const div = document.createElement("div");
    div.className = "input-group mb-2";

    const icon = document.createElement("i");
    icon.className = "fas fa-team input-icon";

    const input = document.createElement("input");
    input.type = "text";
    input.className = "form-control input-with-icon";
    input.name = "times[]";
    input.placeholder = "Nome do time";
    input.required = true;

    div.appendChild(icon);
    div.appendChild(input);
    container.appendChild(div);
}
