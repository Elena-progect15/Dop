<?php
include("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$link->query('SET NAMES UTF-8');
/* проверка соединения */
if ($_SESSION['type'] == 2) {
    $sql_add = "INSERT INTO users SET `username`='" . $_GET['username']
        . "', `password`='"
        . md5($_GET['password']) . "', type='" . $_GET['type'] . "', email='" . $_GET['email'] . "'";

    $link->query($sql_add);

    if (mysqli_affected_rows($link) > 0) {

        print "<p>Спасибо, вы зарегистрировали в базе данных.";
        print "<p><a href=\"usersAdm.php\"> Вернуться к списку пользователей </a>";
    }
}
else {
    echo "Недостаточно прав";
    print "<p><a href=\"os.php\"> На главную </a>";
}

mysqli_close($link);
