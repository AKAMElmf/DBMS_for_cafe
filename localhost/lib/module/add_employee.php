<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: ../../index.php');
    }
?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <?php include 'sys_includes_head.php';?>
	<title>Add employee</title>
</head>
<body>
    <?php include 'sys_includes_body.php';?>
    <form class = "add_employee" action="vendor/signup.php" method="post" enctype="multipart/form-data  ">
        <label>Должность</label>
        <input type="text" name="employee_post_id" placeholder="Должность(1 - Manager, 2 - Servant)">
        <label>Имя</label>
        <input type="text" name="first_name" placeholder="Имя">
        <label>Фамилия</label>
        <input type="text" name="second_name" placeholder="Фамилия">
        <label>Отчество</label>
        <input type="text" name="patronymic" placeholder="Отчество(Необязательно)">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Логин">
        <label>Пароль</label>
        <input type="text" name="password" placeholder="Пароль">
        <label>Телефон</label>
        <input type="tel" name="phone_number" placeholder="Номер телефона">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Почта">
        <label>Адрес</label>
        <input type="text" name="address" placeholder="Адрес">
        <button type="submit">Добавить</button>
        <a href="profile.php" class="back">Назад</a>
    </form>

</body>
</html>