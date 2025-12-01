<?php
session_start();
include_once __DIR__ . '/../core/connection.php';

// Receber dados
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Buscar usuário
$sql = "SELECT id, username, email, password_hash, role FROM users WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(["error" => true, "message" => "Usuário não encontrado!"]);
    exit;
}

// Verificar senha
if (!password_verify($password, $user['password_hash'])) {
    echo json_encode(["error" => true, "message" => "Senha incorreta!"]);
    exit;
}

// Criar sessão
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['role'];

// ROLE = 1 → ADMIN
if ($user['role'] == 1) {
    echo json_encode(["error" => false, "admin" => true, "message" => "Login de administrador!"]);
    exit;
}

// ROLE = 1 → ADMIN
if ($user['role'] == 2) {
    echo json_encode(["error" => false, "admin" => false, "message" => "Login de administrador!"]);
    exit;
}
