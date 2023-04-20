<?php
include('../config/konstansok.php');
session_destroy();

header('location:' . HOME_URL . 'admin/login.php');
?>