<?php
session_start();
if ($_SESSION['user']) {
    header('Location: lib/module/profile.php');
}
?>



<!-- Форма авторизации -->
    <form action="lib/module/vendor/signin.php" method="post" class="reg" >
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

