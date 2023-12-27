<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email', cidade='$cidade', estado='$estado', pais='$pais' WHERE id=$id";
    $conn->query($sql);

    header("Location: index.php");
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>

<body>

    <h2>Editar Usuário</h2>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $row['cidade']; ?>" required><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $row['estado']; ?>" required><br>

        <label>Pais:</label>
        <input type="text" name="pais" value="<?php echo $row['pais']; ?>" required><br>

        <input type="submit" value="Salvar Alterações">
    </form>

    <br>
    <a href="index.php">Voltar para a Lista</a>

</body>

</html>