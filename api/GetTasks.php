<?php
header("Content-Type: application/json; charset=utf-8");
require_once "../core/connection.php"; // SUA CONEXÃO

try {
    // Busca apenas tasks do usuário logado → opcional
    session_start();
    $user_id = $_SESSION["user_id"] ?? null;

    if (!$user_id) {
        echo json_encode(["error" => "Usuário não autenticado."]);
        exit;
    }

    $sql = $conn->prepare("
        SELECT 
            id,
            name,
            description,
            status,
            preco,
            deadline,
            created_at
        FROM tasks
        WHERE user_id = ?
        ORDER BY created_at DESC
    ");

    $sql->execute([$user_id]);

    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));

} catch (Exception $e) {
    echo json_encode([
        "error" => "Erro ao buscar tasks",
        "details" => $e->getMessage()
    ]);
}
