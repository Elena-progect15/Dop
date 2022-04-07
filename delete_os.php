<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_os = $_GET['id_os'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM os WHERE id_os ='$id_os'");
else
    echo "Недостаточно прав";
header("Location: osAdm.php");
exit;
?>
