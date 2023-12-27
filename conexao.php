<?php
$servername = "localhost";
$username = "root";
$password = "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";

$database = "crud";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
