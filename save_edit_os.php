<html>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id_os = $_GET['id_os'];

$name_os = $_GET['name_os'];
$type_os = $_GET['type_os'];
$x_os = $_GET['x_os'];
$dev_os = $_GET['dev_os'];
$count_us = $_GET['count_us'];

$zapros = "UPDATE os SET name_os='$name_os', type_os='$type_os',
x_os='$x_os', dev_os='$dev_os', count_us='$count_us' 
WHERE id_os='$id_os'";

$result = $mysqli->query($zapros);

if ($result) {
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<a href=os.php> Вернуться к списку ОС </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<a href=osAdm.php> Вернуться к списку ОС </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения.<a href=os.php> Вернуться к списку ОС </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения.<a href=osAdm.php> Вернуться к списку ОС </a>";
}
?>
</body>
</html>