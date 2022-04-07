<html>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером


$id_ds = $_GET['id_ds'];
$name_ds = $_GET['name_ds'];
$url = $_GET['url'];

$zapros = "UPDATE ds SET name_ds='$name_ds', url='$url' 
WHERE id_ds='$id_ds'";

$result = $mysqli->query($zapros);

if ($result) {
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<a href=stores.php> Вернуться к списку магазинов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<a href=storesAdm.php> Вернуться к списку магазинов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения.<a href=stores.php> Вернуться к списку магазинов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения.<a href=storesAdm.php> Вернуться к списку магазинов </a>";
}
?>
</body>
</html>