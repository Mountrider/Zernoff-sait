<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
require_once '../connect.php';

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

$password = md5($password);

$result = mysqli_query($connect, "SELECT * FROM user WHERE UserLogin='$login' and UserPassword='$password'"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);

if (empty($myrow['UserPassword'])) {
    //если пользователя с введенным логином не существует
    $_SESSION['message'] = 'Вы ввели неверно пароль или логин';
    header('Location: ../../Login.php');
} else {
    //если существует, то сверяем пароли
    if ($myrow['UserPassword'] == $password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['UserLogin'] = $myrow['UserLogin'];
        $_SESSION['UserId'] = $myrow['UserId'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        header('Location: ../../index.html');
    } else {
        //если пароли не сошлись
        $_SESSION['message'] = 'Вы ввели неверно пароль или логин';
        header('Location: ../../Login.php');
    }
}
?>