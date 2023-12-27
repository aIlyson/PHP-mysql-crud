<?php
include 'conexao.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <h2>Lista de Usuários</h2>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Pais</th>
            <th>Ações</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefone']}</td>
                <td>{$row['cidade']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['pais']}</td>
                <td>
                    <a href='user/editar.php?id={$row['id']}'>Editar</a>
                    <a href='#' onclick='abrirModal({$row['id']})'>Excluir</a>
                </td>
            </tr>";
        }
        ?>
    </table>

    <div class="btn">
        <button onclick="window.location.href='user/adicionar.php'">Adicionar Usuário</button>
    </div>

    <div id="modal" class="modal">
        <div class="m-content">
            <h2>Excluir Usuário</h2>
            <p>Tem certeza que deseja excluir este usuário?</p>
            <button style="margin-bottom: 10px;" id="submit">Confirmar</button>
            <button id="cancel">Cancelar</button>
        </div>
    </div>

    <!-- simulação -->
    <div id="loading" class="loading"></div>

    <script src="js/excluir.js"></script>

</body>

</html>