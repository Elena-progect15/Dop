<html>
<head><title> Сведения о ключах </title></head>
<body>
<h2>Сведения о ключах:</h2>
<table border="1">
    <tr>
        <th>ID ключа</th>
        <th>дата приобретения</th>
        <th> дата окончания</th>
        <th> ОС</th>
        <th> магазин</th>
        <th> стоимость</th>
        <th> ключ</th>
        <th> Редактировать</th>
        <th> Уничтожить</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
    $result = $mysqli->query("SELECT dk.id, dk.date_buy, dk.date_ex, os.name_os as os, ds.name_ds as ds, dk.price, dk.key_os
FROM dk 
LEFT JOIN os ON dk.id_os=os.id_os
LEFT JOIN ds ON dk.id_ds=ds.id_ds"); // запрос на выборку сведений о пользователях

    $counter = 0;
    if ($result) {
        while ($row = $result->fetch_array()) {// для каждой строки из запроса
            $id = $row['id'];
            $date_buy = $row['date_buy'];
            $date_ex = $row['date_ex'];
            $os = $row['os'];
            $ds = $row['ds'];
            $price = $row['price'];
            $key_os = $row['key_os'];

            $date_buy = date('d-m-Y', strtotime($date_buy));
            $date_ex = date('d-m-Y', strtotime($date_ex));

            echo "<tr>";
            echo "<td>$id</td><td>$date_buy</td><td>$date_ex</td><td>$os</td><td>$ds</td><td>$price</td><td>$key_os</td>";

            echo "<td><a href='edit_key.php?id=" . $row['id']
                . "'>Редактировать</a></td>"; //Запуск редактирования
            echo "<td><a href='delete_key.php?id=" . $row['id']
                . "'>Удалить</a></td>"; //запуск удаления
            echo "</tr>";
            $counter++;
        }
    }
    print "</table>";
    print("<p>Всего ОС: $counter </p>");
    echo "<p><a href=new_key.php> Добавить ключ </a>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=os.php> Вернуться назад </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=osAdm.php> Вернуться назад </a>";
    include("checkSession.php");
    ?>
</body>
</html>
