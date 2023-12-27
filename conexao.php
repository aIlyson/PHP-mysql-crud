<?php
$servername = "localhost";
$username = "root";
$password = "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";

$database = "crud";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
