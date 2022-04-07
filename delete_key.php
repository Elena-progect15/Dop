<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id = $_GET['id'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM dk WHERE id='$id'");
else
    echo "Недостаточно прав";
header("Location: keyAdm.php");
exit;
?>
