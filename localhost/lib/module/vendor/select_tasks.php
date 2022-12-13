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
	<title>Select tasks</title>
</head>
<body>
    <?php include '../sys_includes_body.php';?>
    <form class = "select_tasks_form">
    <?php 
    require_once 'connect.php';
    $data = pg_query($connect,"select *from task");
    $select_arr = pg_fetch_all($data);
    for ($i = 0; $i < count($select_arr); $i++) {
        echo ('<div>');
        echo ('Task id: ');
        echo $select_arr[$i]['task_id'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task description: ');
        echo $select_arr[$i]['task_description'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task creation date: ');
        echo $select_arr[$i]['task_creation_date'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task deadline date: ');
        echo $select_arr[$i]['task_deadline_date'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task completed date: ');
        echo $select_arr[$i]['task_completed_date'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task status: ');
        if ($select_arr[$i]['task_status_id']== 1)
        {
            echo ('In progress');
        }else if ($select_arr[$i]['task_status_id']== 2){
            echo ('Completed');
        }
        echo ('<p>');
        echo ('</p>');
        echo ('Task priority: ');
        if ($select_arr[$i]['task_priority_id']== 1)
        {
            echo ('Low');
        }else if($select_arr[$i]['task_priority_id']== 2){
            echo ('Medium');
        }else if($select_arr[$i]['task_priority_id']== 3){
            echo ('High');
        }
        echo ('<p>');
        echo ('</p>');
        echo ('Contact person id: ');
        echo $select_arr[$i]['contact_person_id'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task author id: ');
        echo $select_arr[$i]['task_author_id'];
        echo ('<p>');
        echo ('</p>');
        echo ('Task executer id: ');
        echo $select_arr[$i]['task_executer_id'];
        echo ('<p>');
        echo ('</p>');
        echo ('Contract id: ');
        echo $select_arr[$i]['contract_id'];
        echo ('<p>');
        echo ('</p>');
        echo ('</div>');
        echo ('<p>');
        echo ('</p>');
    }
    ?>
        <a href="../profile.php" class="back">Назад</a>
    </form>
</body>
</html>