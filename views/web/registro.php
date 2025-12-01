<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/System-gest/assets/css/register.css">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Criar Conta</h1>
            <p>Junte-se a nós hoje mesmo</p>
        </div>

        <form class="form" id="register-form">
            <div class="input-group">
                <label for="name">Nome Completo</label>
                <input type="text" id="name" name="username" placeholder="Digite seu nome completo" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password_hash" placeholder="Digite uma senha segura" required>
                <div class="password-strength">
                    Use pelo menos 8 caracteres com letras, números e símbolos
                </div>
            </div>

            <button class="submit-btn">Criar Conta</button>
        </form>

        <div class="divider">
            <span>ou</span>
        </div>

        <div class="login-link">
            <p>Já tem uma conta?<a href="login.php">Fazer login</a></p>
        </div>
    </div>
    <script src="/System-gest/assets/js/Register.js"></script>
</body>
</html>