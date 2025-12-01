const form = document.getElementById("register-form");

form?.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formData = new FormData(form);

  try {
    const response = await fetch("http://localhost/System-gest/api/RegisterUser.php", {
      method: "POST",
      body: formData,
    });

    const text = await response.text();
    console.log("RESPOSTA BRUTA DA API:", text);

    let data;
    try {
      data = JSON.parse(text);
    } catch (e) {
      alert("Erro: a API não retornou JSON válido. Veja o console.");
      return;
    }

    if (data.error) {
      alert(data.message);
      return;
    }

    form.reset();
    window.location.href = "/System-gest/views/web/login.php";

  } catch (error) {
    console.error("Erro no JS:", error);
    alert("Erro ao registrar usuário.");
  }
});
