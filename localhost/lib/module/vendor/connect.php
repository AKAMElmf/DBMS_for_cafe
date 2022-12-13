<?php

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $connect = pg_connect("host=localhost port=5432 dbname=postgres user=$login password=$password");
    if (!$connect) {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../../../index.php');
        exit();
    }
?>