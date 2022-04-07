<html>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id = $_GET['id'];
$date_buy = $_GET['date_buy'];
$date_ex = $_GET['date_ex'];
$id_os = $_GET['id_os'];
$id_ds = $_GET['id_ds'];
$price = $_GET['price'];
$key_os = $_GET['key_os'];

$result = $mysqli->query("UPDATE dk SET date_buy='$date_buy', date_ex='$date_ex' , 
id_os='$id_os', id_ds='$id_ds', price='$price', key_os='$key_os'
WHERE id='$id'");

if ($result) {
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<p><a href=key.php> Вернуться к списку ключей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<p><a href=keyAdm.php> Вернуться к списку ключей </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения. <p></p><a href=key.php> Вернуться к списку ключей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения. <p><a href=keyAdm.php> Вернуться к списку ключей </a>";
}
?>
</body>
</html>