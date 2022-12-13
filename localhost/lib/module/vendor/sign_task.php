<?php
session_start();
if (!$_SESSION['user']) {
header('Location: ../../../index.php');
}
?>
<?php
    require_once 'connect.php';
    $task_description = $_POST['task_description'];
    $task_creation_date = $_POST['task_creation_date'];
    $task_deadline_date = $_POST['task_deadline_date'];
    $task_priority_id = $_POST['task_priority_id'];
    $contact_person_id = $_POST['contact_person_id'];
    $task_executer_id = $_POST['task_executer_id'];
    $contract_id = $_POST['contract_id'];
    $task_status_id = 1;
    $login = $_SESSION['login'];
    $data = pg_query($connect,"select employee_id from employee where login ='$login'");
    $task_author_id = pg_fetch_row($data);
    $task_author_id = trim($task_author_id[0]); 
    $check_error = pg_query($connect,"insert into task (task_description, task_creation_date, task_deadline_date, task_priority_id, contact_person_id, 
    task_executer_id, contract_id, task_status_id, task_author_id) 
    values ('$task_description',  '$task_creation_date', '$task_deadline_date', $task_priority_id, $contact_person_id, $task_executer_id, 
    $contract_id, $task_status_id, $task_author_id)");
    if ($check_error){
        $_SESSION['message'] = 'Задача успешно добавлена!';
        }else{
            $_SESSION['message'] = 'Ошибка добавления задачи!';
        }
    header('Location: ../profile.php');
?>