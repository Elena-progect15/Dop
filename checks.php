<?php
session_start();
if (!isset($_SESSION['type'])) {
    header("Location: index.php");
}
?>