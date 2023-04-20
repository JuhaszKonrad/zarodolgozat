<?php

include('../config/konstansok.php');

$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE id=$id";

$er = mysqli_query($kapcs,$sql);

if($er == true){
    //echo 'Admin Törölve';
    $_SESSION['delete'] = "<div class='success'>Admin Törlése Sikeres!</div>";
    header('location:' . HOME_URL . 'admin/admin-kezeles.php');
}else{
    //echo ('Admin Törlése Sikertelen');
    $_SESSION['delete'] = "Admin Törlése Sikertelen!";
    header('location:' . HOME_URL . "<div class='error'>admin/admin-kezeles.php</div>");
}


?>