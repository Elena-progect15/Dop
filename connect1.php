<?php
$host = 'localhost';
$database = 'a0656504_os';
$user = 'a0656504';
$password = 'etegufekga';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
   or die("ошибка" . mysqli_error($link));
