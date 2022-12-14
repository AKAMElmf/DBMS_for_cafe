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
	<title>Tasks report</title>
</head>
<body>
    <?php include '../sys_includes_body.php';?>
    <form class = "otchet_task_form" method="post">
        <?php
            require_once 'connect.php';
            $data_first = pg_query($connect,"SELECT COUNT(*) FROM task WHERE task_status_id = 1 ");
            $tasks_in_progress = pg_fetch_row($data_first);
            $data_second = pg_query($connect,"SELECT COUNT(*) FROM task WHERE task_status_id = 2 ");
            $tasks_completed = pg_fetch_row($data_second);
            echo ('<div>');
            echo ('<p>');
            echo ('Задач невыполнено: ').$tasks_in_progress[0];
            echo ('</p>');
            echo ('<p>');
            echo ('Количество выполнено: ').$tasks_completed[0];
            echo ('</p>');
            echo ('<p>');
            echo ('</div>');
            if (!$data_first){
                $_SESSION['message'] = 'Ошибка формирования отчета!';
                header('Location: ../profile.php');
            }
            if (!$data_second){
                $_SESSION['message'] = 'Ошибка формирования отчета!';
                header('Location: ../profile.php');
            }
        ?>
        <a href="../profile.php" class="back">Назад</a>
    </form>
</body>
</html>