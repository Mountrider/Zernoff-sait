<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zernoff files</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>
    <link rel='stylesheet' href='css/style.css' type='text/css'/>
</head>
<body>

<header>
    <div class="container">
        <div class="wrap-btn">
            <a href="index.html" class="shine-button">Домой</a>
            <a href="Login.php" class="shine-button">Войти</a>
        </div>
    </div>
</header>

<p align="center"><img src="css/z.png" alt="Логотип"></p>


<form method="post" action="vendor/Register/SignUp.php" style="max-width:500px;margin:auto">
    <h2>Зарегистрируйся</h2>
    <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Имя" name="name">
    </div>

    <div class="input-container">
        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" placeholder="Email" name="email">
    </div>

    <div class="input-container">
        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" placeholder="Login" name="login">
    </div>

    <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" placeholder="Пароль" name="password">
    </div>

    <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" placeholder="Подтвердите пароль" name="passwordconfirm">
    </div>

    <input type="submit" class="btn">

    <div class="container signin">
        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </div>

</form>


<div class="container signin">
    <p>Уже есть аккаунт? <a href="Login.php">Войти</a>.</p>
</div>


<p class="fig"><img src="css/ZZZ.png" alt="Нижнее лого"></p>


</body>
</html>