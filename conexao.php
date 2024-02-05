<?php

$whitelist = array(
    '127.0.0.1',
    '::1'
);

if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    define('MYSQL_HOST', '127.0.0.1');
    define('MYSQL_PORT', '3308');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', 'root');
    define('MYSQL_DB_NAME', 'agenda_chamados');
} else {
    define('MYSQL_HOST', '127.0.0.1');
    define('MYSQL_PORT', '3308');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', 'root');
    define('MYSQL_DB_NAME', 'agenda_chamados');

    ini_set('display_errors', '0');     # don't show any errors...
    error_reporting(E_ALL | E_STRICT);  # ...but do log them
}

try {
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    );
    $pdo = new PDO('mysql:host=' . MYSQL_HOST . ';port=' . MYSQL_PORT . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD, $options);

    header('Content-type: text/html; charset=utf-8');
    setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
    date_default_timezone_set('America/Sao_Paulo');
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
