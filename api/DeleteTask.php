<?php
header("Content-Type: application/json; charset=utf-8");
session_start();
require_once __DIR__ . '/../core/connection.php'; // usa $conn

// Verifica se o usuário está logado
$user_id = $_SESSION["user_id"] ?? null;
if (!$user_id) {
    echo json_encode(["error" => true, "message" => "Usuário não autenticado"]);
    exit;
}

// Verifica se o ID foi enviado
$task_id = $_POST["id"] ?? null;
if (!$task_id) {
    echo json_encode(["error" => true, "message" => "ID da tarefa não informado"]);
    exit;
}

try {
    // DELETE somente se a tarefa pertence ao usuário logado
    $stmt = $conn->prepare("
        DELETE FROM tasks 
        WHERE id = ? AND user_id = ?
    ");
    $stmt->execute([$task_id, $user_id]);

    if ($stmt->rowCount() === 0) {
        echo json_encode([
            "error" => true,
            "message" => "Nenhuma tarefa encontrada ou não pertence ao usuário"
        ]);
        exit;
    }

    echo json_encode([
        "error" => false,
        "message" => "Tarefa deletada com sucesso!"
    ]);
    exit;

} catch (Exception $e) {
    echo json_encode(["error" => true, "message" => "Erro ao deletar tarefa"]);
    exit;
}
