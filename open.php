<?php

@session_start();

if (isset($_SESSION['id']) == false) {
    unset($_SESSION['id']);
    header('location:login.html');
} else if ($_SESSION['id'] == null) {
    unset($_SESSION['id']);
    header('location:login.html');
} else if ($_SESSION['id'] <= 0) {
    unset($_SESSION['id']);
    header('location:login.html');
}

?>