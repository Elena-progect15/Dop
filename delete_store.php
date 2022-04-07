<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database)
or die ("Невозможно подключиться к серверу");
$id_ds = $_GET['id_ds'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM ds WHERE id_ds='$id_ds'");
else
    echo "Недостаточно прав";
header("Location: storesAdm.php");
exit;
?>
