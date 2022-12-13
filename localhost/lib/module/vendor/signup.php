<?php
session_start();
if (!$_SESSION['user']) {
header('Location: ../../../index.php');
}
?>
<?php
    require_once 'connect.php';
    $employee_post_id = $_POST['employee_post_id'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $patronymic = $_POST['patronymic'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $post_name = '';
    if ($employee_post_id == 1)
    {
        $post_name = 'manager';
    }else if ($employee_post_id == 2)
    {
        $post_name = 'servant';
    }
    pg_query($connect,"create user $login with password '$password'");
    pg_query($connect,"grant $post_name to $login ");
    $check_error = pg_query($connect,"insert into employee (employee_post_id, first_name, second_name, patronymic, login, phone_number, email, address) 
    values ($employee_post_id,  '$first_name', '$second_name', '$patronymic', '$login', '$phone_number', '$email', '$address')");
    if ($check_error){
    $_SESSION['message'] = 'Работник успешно добавлен!';
    }else{
        $_SESSION['message'] = 'Ошибка добавления!';
    }
    header('Location: ../profile.php');
?>