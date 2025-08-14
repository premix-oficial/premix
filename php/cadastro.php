<?php
// Inclui a conexão com o banco de dados
include('conexao.php');

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Recebe os dados JSON da requisição
$dados = json_decode(file_get_contents("php://input"), true);

// Verifica se os dados foram enviados corretamente
if (!isset($dados['nome'], $dados['email'], $dados['senha'])) {
    echo json_encode(['mensagem' => 'Dados incompletos.']);
    exit;
}

$nome = $dados['nome'];
$email = $dados['email'];
$senha = password_hash($dados['senha'], PASSWORD_DEFAULT); // Criptografa a senha

// Prepara o comando SQL com segurança (evita SQL Injection)
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");

// Verifica se a preparação deu certo
if (!$stmt) {
    echo json_encode(['mensagem' => 'Erro na preparação do SQL.']);
    exit;
}

// Faz o bind dos parâmetros
$stmt->bind_param("sss", $nome, $email, $senha);

// Executa e verifica o resultado
if ($stmt->execute()) {
    echo json_encode(['mensagem' => 'Usuário cadastrado com sucesso!']);
} else {
    echo json_encode(['mensagem' => 'Erro ao cadastrar o usuário: ' . $stmt->error]);
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
