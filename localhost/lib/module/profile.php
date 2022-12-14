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
	<title>Profile </title>
</head>
<body>
    <?php include 'sys_includes_body.php';?>
    <?php 
    require_once 'vendor/connect.php';
    $data = pg_query($connect,"select employee_post_id from employee where login = '$login'");
    $role = pg_fetch_row($data);
    $role = trim($role[0]);
    ?>
    <form class = "profile">
    <?php
    if ($login == "administrator") {
        echo '<a href="vendor/otchet_employee.php">Отчетность по сотрудникам</a>';
	echo '<a href="vendor/otchet_tasks.php">Отчетность по задачам</a>';
        echo '<a href="add_employee.php" >Добавить работника</a>';
        echo '<a href="vendor/search_client.php" >Поиск клиентов</a>';
    }
    if ($role == 1) {
        echo '<a href="add_task.php">Добавить задачу</a>';
        echo '<a href="vendor/search_client.php" >Поиск клиентов</a>';
    }
    ?>
        <a href="vendor/select_tasks.php" class="select_tasks">Просмотр задач</a>
        <a href="vendor/update_tasks.php" class="update_tasks">Редактирование задач</a>
        <a href="vendor/logout.php" class="logout">Выход</a>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>
