<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../../../index.php');
}
?>
<?php
    require_once 'connect.php';
    $task_id = $_POST['task_id'];
    $task_description = $_POST['task_description'];
    $task_deadline_date = $_POST['task_deadline_date'];
    $task_completed_date = $_POST['task_completed_date'];
    $task_priority_id = $_POST['task_priority_id'];
    $contact_person_id = $_POST['contact_person_id'];
    $task_author_id = $_POST['task_author_id'];
    $task_executer_id = $_POST['task_executer_id'];
    $contract_id = $_POST['contract_id'];
    $check_error = pg_query($connect,"update task set task_description =  '$task_description', task_deadline_date = '$task_deadline_date',
    task_completed_date = '$task_completed_date', task_priority_id = '$task_priority_id', contact_person_id = '$contact_person_id', 
    task_author_id = '$task_author_id', task_executer_id = '$task_executer_id', contract_id = '$contract_id' where task_id = $task_id ");
    if ($check_error){
        $_SESSION['message'] = 'Задача успешно изменена!';
        }else{
            $_SESSION['message'] = 'Ошибка изменения данных!';
        }
    header('Location: ../profile.php');
?>