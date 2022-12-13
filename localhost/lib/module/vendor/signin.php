<?php
    session_start();
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    require_once 'connect.php';
    $_SESSION['user'] = true;
    header('Location: ../profile.php');
?>


