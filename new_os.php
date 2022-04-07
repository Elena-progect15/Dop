<html>
<head><title> Добавление новой ОС </title></head>
<body>
<H2>Добавление новой ОС:</H2>
<?php include("checks.php"); ?>
<form action="save_new_os.php" method="get">
    Название: <input name="name_os" size="50" type="text">
    <br>Тип оборудования: <input name="type_os" size="50" type="text">
    <br>Разрядность: <input name="x_os" size="3" type="int">
    <br>Разработчик: <input name="dev_os" size="50" type="text">
    <br>Количество пользователей: <input name="count_us" size="11" type="int">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<?php
if ($_SESSION['type'] == 1)
    echo "<p><a href=os.php> Вернуться к списку ОС </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=osAdm.php> Вернуться к списку ОС </a>";
?>
</body>
</html>
