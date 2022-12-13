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
	<title>Search clients</title>
</head>
<body>
    <?php include '../sys_includes_body.php';?>
    <form class = "search_client"  method="post">
        <label>Имя</label>
        <input type="text" name="first_name" placeholder="Имя">
        <label>Фамилия с</label>
        <input type="text" name="second_name" placeholder="Фамилия">
        <label>Отчество</label>
        <input type="text" name="patronymic" value='' placeholder="Отчество(Необязательно)">
        <button type="submit">Поиск</button>
        <?php
        if ($_POST['first_name'] and $_POST['second_name']){
            require_once 'connect.php';
            $first_name = $_POST['first_name'];
            $second_name = $_POST['second_name'];
            $patronymic = $_POST['patronymic'];
            $data_first = pg_query($connect,"select *from contact_person where first_name = '$first_name' and second_name = '$second_name' and patronymic = '$patronymic'");
            $client = pg_fetch_all($data_first);
            for ($i = 0; $i < count($client); $i++) {
                echo ('<div>');
                echo ('<p>');
                echo ('</p>');
                echo ('Organization id: ');
                echo $client[$i]['organization_id'];
                echo ('<p>');
                echo ('</p>');
                $additional_contacts_id = $client[$i]['additional_contacts_id'];
                $data_second = pg_query($connect,"select *from additional_contacts where additional_contacts_id = $additional_contacts_id");
                $additional_inf = pg_fetch_row($data_second);
                echo ('Phone number: ');
                echo $additional_inf[1];
                echo ('<p>');
                echo ('</p>');
                echo ('Email: ');
                echo $additional_inf[2];
                echo ('<p>');
                echo ('</p>');
                echo ('Address: ');
                echo $additional_inf[3];
                echo ('<p>');
                echo ('</p>');
                echo ('</div>');
                if (!$data_second){
                    $_SESSION['message'] = 'Ошибка поиска работника!';
                    header('Location: ../profile.php');
                }
            }
            if (!$data_first){
                $_SESSION['message'] = 'Ошибка поиска работника!';
                header('Location: ../profile.php');
            }
        }
        ?>
        <a href="../profile.php" class="back">Назад</a>
    </form>
</body>
</html>