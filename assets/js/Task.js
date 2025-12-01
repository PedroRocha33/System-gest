const form = document.getElementById("task-form");

form?.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formData = new FormData(form);

  try {
    const response = await fetch("http://localhost/System-gest/api/CreateTask.php", {
      method: "POST",
      body: formData,
    });

    console.log("HTTP status:", response.status, response.statusText);

    // pegar texto cru pra ver se tem warning/notice vindo antes do JSON
    // const text = await response.text();
    // console.log("RESPOSTA BRUTA DA API:", text);

    // tentar parsear JSON
    // let data;
    // try {
    //   data = JSON.parse(text);
    // } catch (err) {
    //   console.error("Falha ao parsear JSON:", err);
    //   alert("A API retornou algo inválido. Veja o console (Network -> Response) para detalhes.");
    //   return;
    // }

    // console.log("JSON da API:", data);

    // if (data.error) {
    //   alert("Erro: " + data.message);
    //   return;
    // }

    alert("Tarefa criada com sucesso!");
    form.reset();

    // opcional: atualizar UI / redirecionar
    // window.location.href = "/System-gest/views/app/index.php";

  } catch (error) {
    console.error("Erro no fetch:", error);
    alert("Erro inesperado ao criar tarefa. Veja o console para detalhes.");
  }
});
