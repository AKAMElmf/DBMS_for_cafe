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
	<title>Add task</title>
</head>
<body>
    <?php include 'sys_includes_body.php';?>
    <form class = "add_task" action="vendor/sign_task.php" method="post" enctype="multipart/form-data  ">
        <label>Описание</label>
        <input type="text" name="task_description" placeholder="Описание">
        <?php
        echo '<input type="hidden" name="task_creation_date" value="'.date("Y-m-d").'">';
        ?>
        <label>Дата дедлайна</label>
        <input type="date" name="task_deadline_date" placeholder="Дата дедлайна">
        <label>Приоритет задачи</label>
        <input type="text" name="task_priority_id" placeholder="1-Низкий 2-Средний 3-Высокий ">
        <label>Контактное лицо</label>
        <input type="text" name="contact_person_id" placeholder="Контактное лицо">
        <label>Исполнитель задачи</label>
        <input type="text" name="task_executer_id" placeholder="Исполнитель задачи">
        <label>Номер контракта</label>
        <input type="text" name="contract_id" placeholder="Номер контракта">
        <button type="submit">Добавить</button>
        <a href="profile.php" class="back">Назад</a>
    </form>

</body>
</html>