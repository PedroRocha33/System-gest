<?php
header("Content-Type: application/json; charset=utf-8");
session_start();
include_once __DIR__ . '/../core/connection.php';

$user_id    = $_SESSION['user_id'] ?? null;
$name       = $_POST["name"] ?? null;
$desc       = $_POST["description"] ?? null;
$deadline   = $_POST["deadline"] ?? null;
$preco      = $_POST["preco"] ?? null;      // NOVO
$status     = $_POST["status"] ?? null;     // NOVO

if (!$user_id || !$name || !$desc || !$preco || !$status) {
    echo json_encode(["error" => true, "message" => "Preencha todos os campos obrigatórios"]);
    exit;
}

try {
    $sql = $conn->prepare("
        INSERT INTO tasks (user_id, name, description, deadline, preco, status)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $sql->execute([
        $user_id,
        $name,
        $desc,
        $deadline ?: null,
        $preco,
        $status
    ]);

    echo json_encode([
        "error" => false,
        "message" => "Tarefa criada com sucesso!",
        "task_id" => $conn->lastInsertId()
    ]);
    exit;

} catch (Exception $e) {
    echo json_encode(["error" => true, "message" => "Erro ao salvar tarefa"]);
    exit;
}
