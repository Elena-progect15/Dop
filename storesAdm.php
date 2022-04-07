<html>
<head><title> Сведения о магазинах </title></head>
<body>
<h2>Сведения о магазинах:</h2>
<table border="1">
    <tr>
        <th>id магазина</th>
        <th>название</th>
        <th>url</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_ds, name_ds, url FROM ds"); // запрос на выборку сведений о пользователях
    mysqli_select_db($link, "ds");

    while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
        echo "<tr>";
        echo "<td>" . $row['id_ds'] . "</td>";
        echo "<td>" . $row['name_ds'] . "</td>";
        echo "<td>" . $row['url'] . "</td>";
        echo "<td><a href='edit_store.php?id_ds=" . $row['id_ds']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_store.php?id_ds=" . $row['id_ds']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего магазинов: $num_rows </p>");
    echo "<p><a href=new_store.php> Добавить магазин </a>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=os.php> Вернуться назад </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=osAdm.php> Вернуться назад </a>";
    include("checkSession.php");
    ?>
</body>
</html>