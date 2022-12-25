<?php

session_start();
require_once '../connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['passwordconfirm'];


//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$password_confirm = stripslashes($password_confirm);
$password_confirm = htmlspecialchars($password_confirm);

//удаляем лишние пробелы
$name = trim($name);
$email = trim($email);
$login = trim($login);
$password = trim($password);
$password_confirm = trim($password_confirm);


if ($password === $password_confirm) {

    $result = mysqli_query($connect, "SELECT * FROM `user` WHERE UserLogin = '$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['UserId'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    $password = md5($password);
    $result2 = mysqli_query($connect,"INSERT INTO `user`(`UserId`, `UserName`, `UserEmail`, `UserLogin`, `UserPassword`) VALUES (NULL,'$name','$email', '$login', '$password')");
    header('Location: ../../index.html');

} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../../Registration.php');
}
