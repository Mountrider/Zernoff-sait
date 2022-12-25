<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'zernoff');

if (!$connect) {
    die('Error connect to database!');
}