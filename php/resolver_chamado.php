<?php
@session_start();

require_once "../conexao.php";

$id = $_GET['id'];

try {
    $sql = "UPDATE chamado SET RESOLVIDO = 1, DATA_HORA_RESOLUCAO = NOW() WHERE ID = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id);
    $sth->execute();

    header('Location: ../index.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
