<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../../../index.php');
}
?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
	<?php include '../sys_includes_head.php';?>
	<title>Update tasks</title>
</head>
<body>
    <?php include '../sys_includes_body.php';?>
    <form class = "update_tasks_form" action="update.php" method="post">
    <?php 
    require_once 'connect.php';
    $data = pg_query($connect,"select *from task");
    $select_arr = pg_fetch_all($data);
    for ($i = 0; $i < count($select_arr); $i++) {
        echo ('<div>');
        echo ('Task id: ');
        echo $select_arr[$i]['task_id'];
        echo ('</div>');
        echo ('<p>');
        echo ('</p>');
    }
    ?>
        <input type="text" name="task_id" placeholder="Введите номер задачи">
        <button type="submit">Редактировать</button>
        <a href="../profile.php" class="back">Назад</a>
    </form>
</body>
</html>