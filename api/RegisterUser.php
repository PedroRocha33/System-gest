<?php


session_start();
include_once __DIR__ . '/../core/connection.php';

$name = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password_hash'] ?? '';

if (empty($name) || empty($email) || empty($password)) {
    echo json_encode([
        "error" => true,
        "message" => "Todos os campos são obrigatórios"
    ]);
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {

    $stmt = $conn->prepare("
        INSERT INTO users (username, email, password_hash, role)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([$name, $email, $hashedPassword, 2]);

    // PEGA O ID GERADO
    $userId = $conn->lastInsertId();

    if ($userId > 0) {

        // SALVA NA SESSÃO
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = 2;

        echo json_encode([
            "error" => false,
            "message" => "Usuário registrado com sucesso!"
        ]);
        exit;
    }

    echo json_encode([
        "error" => true,
        "message" => "Erro ao inserir usuário"
    ]);
    exit;

} catch (Throwable $th) {

    echo json_encode([
        "error" => true,
        "message" => $th->getMessage()
    ]);
    exit;
}
