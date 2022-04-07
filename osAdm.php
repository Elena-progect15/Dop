<html>
<head><title> Сведения об ОС </title></head>
<body>
<h2>Сведения об ОС:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th> Тип оборудования</th>
        <th> Разрядность</th>
        <th> Разработчик</th>
        <th> Количество пользователей</th>
        <th> Редактировать</th>
        <th> Уничтожить</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_os, name_os, type_os, x_os, dev_os, count_us
FROM os"); // запрос на выборку сведений о пользователях
    mysqli_select_db($link, "os");

    while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
        echo "<tr>";
        echo "<td>" . $row['id_os'] . "</td>";
        echo "<td>" . $row['name_os'] . "</td>";
        echo "<td>" . $row['type_os'] . "</td>";
        echo "<td>" . $row['x_os'] . "</td>";
        echo "<td>" . $row['dev_os'] . "</td>";
        echo "<td>" . $row['count_us'] . "</td>";
        echo "<td><a href='edit_os.php?id_os=" . $row['id_os']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_os.php?id_os=" . $row['id_os']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего ОС: $num_rows </p>");
    if ($_SESSION['type'] == 1) {
        echo "<p><a href=new_os.php> Добавить ОС</a>";
        echo "<p><a href=key.php>Ключи</a>";
        echo "<p><a href=stores.php>Магазины</a>";
        echo "<p><a href=edit_users.php?id_u=" . $_SESSION['id_u'] . "> Изменить данные Оператора</a>";
    } elseif ($_SESSION['type'] == 2) {
        echo "<p><a href=new_os.php> Добавить ОС</a>";
        echo "<p><a href=keyAdm.php>Ключи</a>";
        echo "<p><a href=storesAdm.php>Магазины</a>";
        echo "<p><a href=usersAdm.php>Изменить данные Пользователей</a>";
    }
    echo "<p><a href=gen_pdf.php>Скачать pdf-файл</a>";
    echo "<p><a href=gen_xls.php>Скачать xls-файл</a>";
    include("checkSession.php");
    ?>
</body>
</html>