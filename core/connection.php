<?php


$host = 'localhost';

// Nome do banco de dados que você criou
$dbName = 'system_gest';

// Nome de usuário do seu MySQL
$dbUser = 'root'; // Altere para seu usuário, se não for 'root'

// Senha do seu MySQL
$dbPass = ''; // Coloque sua senha aqui! (em ambiente de produção, NUNCA deixe vazia)

// Opções do PDO
$options = [
    // Define que o PDO lançará exceções em caso de erros
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    
    // Define o modo de retorno padrão para objetos, facilitando o acesso
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    
    // Desativa a emulação de prepared statements para maior segurança
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";
    
    // Cria a nova instância PDO, estabelecendo a conexão
    $conn = new PDO($dsn, $dbUser, $dbPass, $options);
    
    // Se a conexão for bem-sucedida, $pdo agora é um objeto de conexão.
    // Opcionalmente, você pode deixar uma mensagem (apenas para teste):
    // echo "Conexão estabelecida com sucesso!";

} catch (\PDOException $e) {
    // Em caso de erro na conexão, mata o script e mostra o erro
    
    // Para depuração:
    // echo "Erro de Conexão: " . $e->getMessage();
    
    // Para produção (mais seguro, esconde detalhes do erro):
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// ---------------------------------------------
// O arquivo connection.php agora fornece a variável $pdo
// para ser usada em qualquer outro script PHP que o incluir.
// ---------------------------------------------

// Opcionalmente, você pode comentar ou remover a mensagem de sucesso após o teste.

?>