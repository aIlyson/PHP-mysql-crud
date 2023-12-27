<?php
include __DIR__ . '/../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $sql = "UPDATE usuarios SET nome=?, email=?, telefone=?, cidade=?, estado=?, pais=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        header("Location: ../erro.php");
        exit();
    }

    $stmt->bind_param("ssssssi", $nome, $email, $telefone, $cidade, $estado, $pais, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../erro.php");
        exit();
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        header("Location: ../erro.php");
        exit();
    }

    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            header("Location: ../erro.php");
            exit();
        }
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
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <h2>Editar Usuário</h2>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label>Telefone:</label>
        <input type="tel" name="telefone" pattern="[0-9 ()+-]+" minlength="14" maxlength="15" value="<?php echo $row['telefone']; ?>" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $row['cidade']; ?>" required>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $row['estado']; ?>" required>

        <label>Pais:</label>
        <input type="text" name="pais" value="<?php echo $row['pais']; ?>" required>

        <div class="btn">
        <input type="submit" value="Salvar Alterações">
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