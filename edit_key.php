<html>
<head>
    <title> Редактирование данных о ключах </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id = $_GET['id'];
$prod = mysqli_query($mysqli, "SELECT
			dk.id,
			dk.date_buy,
			dk.date_ex,
			dk.price,
			dk.key_os,

			os.id_os as id_os,
			os.name_os as name_os,

			ds.id_ds as id_ds,
			ds.name_ds as name_ds

			FROM dk
			LEFT JOIN os ON dk.id_os=os.id_os
			LEFT JOIN ds ON dk.id_ds=ds.id_ds
			WHERE dk.id='$id'"
);

if ($prod) {
    $prod = $prod->fetch_array();

    $id = $prod['id'];
    $date_buy = $prod['date_buy'];
    $date_ex = $prod['date_ex'];
    $price = $prod['price'];
    $key_os = $prod['key_os'];

    $id_ds = $prod['id_ds'];
    $name_ds = $prod['name_ds'];

    $id_os = $prod['id_os'];
    $name_os = $prod['name_os'];

}


print "<form action='save_edit_key.php' method='get'>";


$result = $mysqli->query("SELECT id_os, name_os FROM os WHERE id_os <> '$id_os' ");
echo "<br>ОС:<select name='id_os'>";
echo "<option selected value='$id_os'>$name_os</option>";
if ($result) {
    while ($row = $result->fetch_array()) {
        $id_os = $row['id_os'];
        $name_os = $row['name_os'];
        echo "<option value='$id_os'>$name_os</option>";

    }
}
echo "</select>";

//работа с магазинами

$result = $mysqli->query("SELECT id_ds, name_ds FROM ds WHERE id_ds <> '$id_ds' ");
echo "<br>Магазин: <select name='id_ds'>";
echo "<option selected value='$id_ds'>$name_ds</option>";

if ($result) {
    while ($row = $result->fetch_array()) {
        $id_ds = $row['id_ds'];
        $name_ds = $row['name_ds'];
        echo "<option value='$id_ds'>$name_ds</option>";
    }
}
echo "</select>";


print "<br> дата приобретения: <input name='date_buy' placeholder='dd-mm-yyyy' type='date' value=$date_buy>";
print "<br> дата окончания: <input name='date_ex' placeholder='dd-mm-yyyy' type='date' value=$date_ex>";
print "<br> стоимость: <input name='price' size='11' type='int' value=$price>";
print "<br> ключ: <input name='key_os' size='11' type='int'value=$key_os>";
print "<input type='hidden' name='id' size='11' value=$id>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=key.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=keyAdm.php> Вернуться назад </a>";
?>
</body>
</html>