<?php
include __DIR__ . '/../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $pais = isset($_POST['pais']) ? $_POST['pais'] : '';

    $sql = "INSERT INTO usuarios (nome, email, telefone, cidade, estado, pais) VALUES ('$nome', '$email', '$telefone', '$cidade', '$estado', '$pais')";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../erro.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <h2>Adicionar Novo Usuário</h2>

    <form method="post" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Telefone:</label>
        <input type="tel" name="telefone" pattern="[0-9 ()+-]+" minlength="14" maxlength="15" required><br>

        <label>Cidade:</label>
        <input type="text" name="cidade" required><br>

        <label>Estado:</label>
        <input type="text" name="estado" required><br>

        <label>Pais:</label>
        <input type="text" name="pais" required><br>

        <div class="btn">
            <input type="submit" value="Adicionar">
        </div>
    </form>

    <div class="btn">
        <button onclick="window.location.href='../index.php'">Voltar</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="telefone"]').mask('(00) 0000-0000');
        });
    </script>
</body>

</html>