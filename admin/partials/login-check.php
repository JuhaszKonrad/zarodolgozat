<?php

    //Authorization - Access Control
    if(!isset(  $_SESSION['user'])){ //a felhasználó nincs bejelentkezve
    $_SESSION['no-login-msg'] = "<div class='error text-center'>Kérlek jelentkezz be!</div>";

    header('location:' . HOME_URL . 'admin/login.php');
    }
?>