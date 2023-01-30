<?php

//START SESSION
session_start();

define('HOME_URL','http://localhost/z%C3%A1r%C3%B3/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'étel-rendelés');

$kapcs = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($kapcs));
$db_select = mysqli_select_db($kapcs,'étel-rendelés') or die(mysqli_error($kapcs));
?>