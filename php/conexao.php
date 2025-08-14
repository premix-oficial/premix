<?php
$host = "localhost";
$user = "root";
$senha = ""; // Coloque sua senha, se houver
$banco = "usuarios_db"; // Nome do banco que você criou

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>