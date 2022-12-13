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
	<title>Employee report</title>
</head>
<body>
    <?php include '../sys_includes_body.php';?>
    <form class = "otchet_employee_form" method="post">
        <label>Номер работника</label>
        <input type="text" name="employee_id" placeholder="Номер работника">
        <label>Период с</label>
        <input type="date" name="start_date" placeholder="Период с">
        <label>Период до</label>
        <input type="date" name="end_date" placeholder="Период до">
        <button type="submit">Вывести отчет</button>
        <?php
        if ($_POST['employee_id']){
            require_once 'connect.php';
            $employee_id = $_POST['employee_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $data = pg_query($connect,"select *from create_employee_report($employee_id, '$start_date', '$end_date')");
            $report_arr = pg_fetch_row($data);
            echo ('<div>');
            echo ('<p>');
            echo ('Всего задач: ').$report_arr[0];
            echo ('</p>');
            echo ('<p>');
            echo ('Количество задач, выполненных вовремя: ').$report_arr[1];
            echo ('</p>');
            echo ('<p>');
            echo ('Количество задач, выполненных невовремя: ').$report_arr[2];
            echo ('</p>');
            echo ('<p>');
            echo ('Количество невыполненных просроченных задач: ').$report_arr[3];
            echo ('</p>');
            echo ('<p>');
            echo ('Количество невыполненных непросроченных задач: ').$report_arr[4];
            echo ('</p>');
            echo ('</div>');
            if (!$data){
                $_SESSION['message'] = 'Ошибка формирования отчета!';
                header('Location: ../profile.php');
            }
        }
        ?>
        <a href="../profile.php" class="back">Назад</a>
    </form>
</body>
</html>