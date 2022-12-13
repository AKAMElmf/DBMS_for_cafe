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
    <form class = "update_task_form" action="complete_update.php" method="post">
    <?php 
    require_once 'connect.php';
    $task_id = $_POST['task_id'];
    $data = pg_query($connect,"select *from task where task_id = $task_id");
    $select_arr = pg_fetch_all($data);
    echo ('<div>');
    echo ('<p>');
    echo ('Task description: ');
    echo '<input type="text" name="task_description" placeholder = "'.$select_arr[0]['task_description'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Task deadline date: ');
    echo '<input type="date" name="task_deadline_date" placeholder = "'.$select_arr[0]['task_deadline_date'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Task completed date: ');
    echo '<input type="date" name="task_completed_date" placeholder = "'.$select_arr[0]['task_completed_date'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Task priority: ');
    echo '<input type="text" name="task_priority_id" placeholder = "'.$select_arr[0]['task_priority_id'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Contact person id: ');
    echo '<input type="text" name="contact_person_id" placeholder = "'.$select_arr[0]['contact_person_id'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Task author id: ');
    echo '<input type="text" name="task_author_id" placeholder = "'.$select_arr[0]['task_author_id'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Task executer id: ');
    echo '<input type="datextte" name="task_executer_id" placeholder = "'.$select_arr[0]['task_executer_id'].'">'; 
    echo ('</p>');
    echo ('<p>');
    echo ('Contract id: ');
    echo '<input type="text" name="contract_id" placeholder = "'.$select_arr[0]['contract_id'].'">'; 
    echo '<input type="hidden" name="task_id" value = '.$task_id.'>'; 
    echo ('</p>');
    echo ('</div>');
    echo ('<p>');
    echo ('</p>');
    ?>
        <button type="submit">Редактировать</button>
        <a href="../profile.php" class="back">Назад</a>
    </form>
</body>
</html>