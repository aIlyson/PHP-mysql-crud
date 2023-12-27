<?php
include __DIR__ . '/../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";
    $conn->query($sql);

    header("Location: ../index.php");
}
?>
