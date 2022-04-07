<?php
include ("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysql_connect_error());
    exit();
} // установление соединения с сервером и подключение к базе данных:
// Строка запроса на добавление записи в таблицу:
mysqli_query($link, "INSERT INTO ds SET name_ds='" . $_GET['name_ds']
    . "', url='" . $_GET['url'] . "'");
if (mysqli_affected_rows($link) > 0) // если нет ошибок при выполнении запроса
{
    print "<p>Спасибо, Ваш магазин добавлен в базу данных.";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=stores.php> Вернуться к списку магазинов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=storesAdm.php> Вернуться к списку магазинов </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=stores.php> Вернуться к списку магазинов </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=storesAdm.php> Вернуться к списку магазинов </a>";
}
mysqli_close($link);
?>
