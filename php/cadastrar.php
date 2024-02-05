<?php

require_once "../conexao.php";

try {
    $senha = $_POST['senha'];
    $custo = '10';
    $salt = '1nXcWY2sEN7754jEEGt2qC';
    
    $senhaCript = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

    $sql = "INSERT INTO usuario (NOME, `LOGIN`, SENHA) VALUES (:nome, :loginn, :senha)";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
    $sth->bindParam(':loginn', $_POST['login'], PDO::PARAM_STR);
    $sth->bindParam(':senha', $senhaCript, PDO::PARAM_STR);
    $sth->execute();

    header("Location: ../login.html");

} catch (Exception $e) {
    echo 'Erro ao executar SQL: '.$e->getMessage();
    exit();
}
