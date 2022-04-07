<html>
<head><title> Добавление нового магазина </title></head>
<body>
<H2>Добавление нового магазина:</H2>
<?php include("checks.php"); ?>
<form action="save_new_store.php" method="get">
    Название: <input name="name_ds" size="50" type="text">
    <br>url: <input name="url" size="50" type="text">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<?php
if ($_SESSION['type'] == 1)
    echo "<p><a href=stores.php> Вернуться к списку магазинов </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=storesAdm.php> Вернуться к списку магазинов </a>";
?>
</body>
</html>
