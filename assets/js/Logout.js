document.addEventListener("DOMContentLoaded", () => {
    const logoutBtn = document.getElementById("logout-btn");

    if (!logoutBtn) return;

    logoutBtn.addEventListener("click", async () => {

        if (!confirm("Deseja realmente sair?")) return;

        try {
            const req = await fetch("/System-gest/api/Logout.php", {
                method: "POST"
            });

            const res = await req.json();
            console.log(res);

            if (res.success) {
                window.location.href = "/System-gest/views/web/login.php";
            } else {
                alert("Erro ao realizar logout!");
            }

        } catch (error) {
            alert("Falha ao conectar com o servidor.");
        }
    });
});
