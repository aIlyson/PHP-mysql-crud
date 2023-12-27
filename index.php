<?php
include 'conexao.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD em PHP</title>
</head>

<body>

    <h2>Lista de Usuários</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Pais</th>
            <th>Ações</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['cidade']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['pais']}</td>
                <td>
                    <a href='editar.php?id={$row['id']}'>Editar</a>
                    <a href='excluir.php?id={$row['id']}'>Excluir</a>
                </td>
            </tr>";
        }
        ?>
    </table>

    <br>
    <a href="adicionar.php">Adicionar Novo Usuário</a>

</body>

</html>