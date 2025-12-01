const form = document.querySelector(".form");

form?.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formData = new FormData(form);

  try {
    const response = await fetch("http://localhost/System-gest/api/LoginUser.php", {
      method: "POST",
      body: formData,
    });

    const data = await response.json();

    if (data.error) {
      alert(data.message);
      return;
    }

      if(data.admin){
        // ADMIN
        window.location.href = "/System-gest/views/admin/index.php";
    } else {
        // USER
        // Sucesso → redireciona
    window.location.href = "/System-gest/views/app/index.php";
    }
   

  } catch (error) {
    alert("Erro inesperado ao fazer login.");
  }
});
