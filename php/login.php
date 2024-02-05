<?php

@session_start();

require_once "../conexao.php";

try {
    $sql = "SELECT * FROM usuario WHERE `LOGIN` = :loginn";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':loginn', $_POST["login"], PDO::PARAM_STR);
    $sth->execute();
    $dados = $sth->fetchObject();

    if ($dados !== false) {
        // verifica se a senha é a mesma
        if (crypt($_POST["senha"], $dados->SENHA) === $dados->SENHA) {
            // continua o processo
        } else {
            header("Location: ../login.html");
            exit();
        }

        @session_start();

        $_SESSION['id'] = $dados->ID;
        $_SESSION['nome'] = $dados->NOME;

        header("Location: ../index.php");

    } else {
        header("Location: ../login.html");
    }

} catch (Exception $e) {
    echo 'Erro ao executar SQL: ' . $e->getMessage();
}
