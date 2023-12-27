<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $sql = "INSERT INTO usuarios (nome, email, cidade, estado, pais) VALUES ('$nome', '$email', '$cidade', '$estado', '$pais')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Usuário</title>
</head>

<body>

    <h2>Adicionar Novo Usuário</h2>

    <form method="post" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Cidade:</label>
        <input type="text" name="cidade" required><br>

        <label>Estado:</label>
        <input type="text" name="estado" required><br>

        <label>Pais:</label>
        <input type="text" name="pais" required><br>

        <input type="submit" value="Adicionar">
    </form>

    <br>
    <a href="index.php">Voltar para a Lista</a>

</body>

</html>
