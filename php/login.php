<?php
include('conexao.php');

$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$senha = $data->senha;

$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(["mensagem" => "Login bem-sucedido!"]);
} else {
    echo json_encode(["mensagem" => "Email ou senha incorretos."]);
}
?>
