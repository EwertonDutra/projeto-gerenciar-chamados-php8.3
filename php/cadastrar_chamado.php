<?php
@session_start();

require_once "../conexao.php";

try {
    $sql = "INSERT INTO chamado (PROBLEMA, ID_USUARIO) VALUES (:problema, :id_usuario)";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':problema', $_POST['problema'], PDO::PARAM_STR);
    $sth->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_STR);
    $sth->execute();

    header("Location: ../index.php");

} catch (Exception $e) {
    echo 'Erro ao executar SQL: '.$e->getMessage();
    exit();
}
