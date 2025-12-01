document.addEventListener("DOMContentLoaded", () => {
    loadTasks();
});

// Lista do banco
async function loadTasks() {
    const tableBody = document.getElementById("serviceTableBody");
    tableBody.innerHTML = "<tr><td colspan='7'>Carregando...</td></tr>";

    try {
        const req = await fetch("/System-gest/api/GetTasks.php");
        const tasks = await req.json();

        console.log("Tasks carregadas:", tasks);

        if (!Array.isArray(tasks) || tasks.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="7">Nenhum serviço encontrado</td></tr>`;
            return;
        }

        tableBody.innerHTML = "";

        tasks.forEach(task => {
            const tr = document.createElement("tr");

            tr.innerHTML = `
                <td>#${task.id}</td>
                <td>${task.name}</td>
                <td>${task.description}</td>
                <td><span class="status">${task.status}</span></td>
                <td>R$ ${parseFloat(task.preco).toFixed(2)}</td>
                <td>${task.deadline}</td>
                <td>
                    <button class="btn-delete" data-id="${task.id}">Excluir</button>
                </td>
            `;

            tableBody.appendChild(tr);
        });

        initDeleteButtons();

    } catch (err) {
        console.error(err);
        tableBody.innerHTML = `<tr><td colspan='7'>Erro ao carregar serviços</td></tr>`;
    }
}

function initDeleteButtons() {
    document.querySelectorAll(".btn-delete").forEach(btn => {
        btn.addEventListener("click", async () => {
            const id = btn.dataset.id;

            if (!confirm("Tem certeza que deseja excluir esse serviço?")) return;

            const formData = new FormData();
            formData.append("id", id);

            const req = await fetch("/System-gest/api/DeleteTask.php", {
                method: "POST",
                body: formData
            });

            const res = await req.json();
            console.log(res);

            if (res.success) {
                loadTasks(); // recarrega lista
            } else {
                window.location.reload();

            }
        });
    });
}
